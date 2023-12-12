<?php

namespace App\Http\Controllers;

use App\Models\Cronjob;
use App\Models\Domain;
use App\Models\Label;
use App\Models\LabelDomain;
use App\Models\subLabelDomain;
use App\Models\Todo;
use App\Models\User;
use App\Services\Rapiwha\Rapiwha;
use App\Services\Whatsapp\Whatsapp;
use App\Services\Woowa\Woowa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\GoogleCalendar\Event;
use Yajra\DataTables\DataTables;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::orderBy('created_at', 'DESC')->get();
        $todoConfirm = Todo::where('isConfirm', false)->get();
        $user = User::where('isSupport', true)->where('isAdmin', false)->get();
        return view('master.todo.index', compact('user', 'todo', 'todoConfirm'));
    }
    public function report()
    {
        return view('master.todo.report');
    }
    public function allTodo(Request $request)
    {
        $data = Todo::where('status', '!=', 'deleted')->with('users', 'domains')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $isAdmin = Auth::user() &&  Auth::user()->isAdmin == true;
                    $labelsArray = $row->label->pluck('name')->toArray();
                    $labelsJson = json_encode($labelsArray);
                    $labelsJson = htmlspecialchars($labelsJson, ENT_QUOTES, 'UTF-8');
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            <a  style="color: #171dd4c4;" href="/todo/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                            </a>
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function deletedTodo(Request $request)
    {
        $data = Todo::where('status', '=', 'deleted')->with('users', 'domains')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $isAdmin = Auth::user() &&  Auth::user()->isAdmin == true;
                    $labelsArray = $row->label->pluck('name')->toArray();
                    $labelsJson = json_encode($labelsArray);
                    $labelsJson = htmlspecialchars($labelsJson, ENT_QUOTES, 'UTF-8');
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            <a  style="color: #171dd4c4;" href="/todo/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                            </a>
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function todos()
    {
        $domain = Domain::all();
        $label = LabelDomain::all();
        $sublabel = subLabelDomain::all();
        $todo = Todo::all();
        $authUserId = Auth::id();
        $domainsTodo = Domain::whereHas('todos', function ($query) use ($authUserId) {
            $query->whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', 'todo');
        })->get();
        $domainsDoing = Domain::whereHas('todos', function ($query) use ($authUserId) {
            $query->whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', 'doing');
        })->get();
        $domainsDone = Domain::whereHas('todos', function ($query) use ($authUserId) {
            $query->whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', 'done');
        })->get();

        return view('master.todo.todos', compact('domainsTodo', 'domainsDoing', 'domainsDone', 'todo', 'domain', 'label', 'sublabel'));
    }
    public function create()
    {
        $domain = Domain::all();
        $label = LabelDomain::all();
        $sublabel = subLabelDomain::all();
        $user = User::where('isSupport', 1)
            ->where('isAdmin', 0)
            ->get();
        return view('master.todo.create', compact('domain', 'user', 'label', 'sublabel'));
    }
    public function edit(Todo $todo)
    {
        $domain = Domain::all();
        $label = LabelDomain::all();
        $sublabel = subLabelDomain::all();
        $user = User::where('isSupport', 1)
            ->where('isAdmin', 0)
            ->get();
        return view('master.todo.edit', compact('domain', 'user', 'label', 'sublabel', 'todo'));
    }
    public function store(Request $request)
    {
        $labels = $request->input('labels', []);

        $nama_domain = [];
        $domains = $request->input('domain', []);
        foreach ($labels as $label) {
            $labelModel[$label] = LabelDomain::find($label);
            if ($request->sublabels) {
                $subLabel = $request->input('sublabels', []);
                $syncData = [];

                foreach ($domains as $domainId) {
                    foreach ($subLabel as $subLabelId) {
                        $syncData[$domainId] = ['sub_label_domain_id' => $subLabelId];
                    }
                }
                $labelModel[$label]->domain()->syncWithoutDetaching($syncData);
                $labelModel[$label]->domain()->syncWithoutDetaching($domains);
            } else {
                $labelModel[$label]->domain()->syncWithoutDetaching($domains);
            }
        }
        if ($request->has('domain')) {
            foreach ($domains as $domainId) {
                $nama_domain = Domain::findOrFail($domainId);
                $domainName[] = $nama_domain->nama_domain;
                $todo = new Todo();
                $todo->subject = $request->subject;
                $todo->catatan = $request->catatan;
                $todo->todoFrom = Auth::user()->id;
                $todo->save();
                $todo->label()->syncWithoutDetaching($labels);
                $todo->domains()->attach($domainId);
                $todo->users()->attach($request->user);
            }
        } else {
            $todo = new Todo();
            $todo->subject = $request->subject;
            $todo->catatan = $request->catatan;
            $todo->todoFrom = Auth::user()->id;
            $todo->save();
            $todo->label()->syncWithoutDetaching($labels);
            $todo->users()->attach($request->user);
        }


        $namaDomainString = '';
        $index = 0;

        if ($request->has('domain')) {
            foreach ($domainName as $item) {
                $namaDomainString .= $index + 1 . '. ' . $item . '\n';
                $index++;
            }
        } else {
            $namaDomainString = '-';
        }
        $user = [];
        foreach ($request->user as $users) {
            $user[] = User::findOrFail($users);
        }
        foreach ($user as $item) {
            $messages = 'Hi ' . $item->name . ' , Anda Memiliki Tugas baru !!
Nama Domain :
' . $namaDomainString . '
Subject :
' . $request->subject . '
Keterangan :
' . $request->catatan;
            // $whatsapp = new Rapiwha();
            $whatsapp = new Woowa();
            // $whatsapp = new Whatsapp();
            $response =  $whatsapp->sendWhatsapp($item->no_hp, $messages);
        }
        // if ($response) {
        return redirect()->route('todo.index')->with(['success' => 'Todo berhasil ditambahkan', 'whatsapp_success' => 'Berhasil Mengirim Pesan WhatsApp']);
        // } else {
        //     return redirect()->route('todo.index')->with(['success' => 'Todo berhasil ditambahkan'])->with(['error' => 'Gagal Mengirimkan Pesan WhatsApp']);
        // }
    }
    public function todosStore(Request $request)
    {
        $nama_domain = [];
        $admin = env('WHATSAPP_ADMIN');
        $domains = $request->input('domain', []);
        if ($request->has('domain')) {
            foreach ($domains as $domainId) {
                $nama_domain = Domain::findOrFail($domainId);
                $domainName[] = $nama_domain->nama_domain;
                $todo = new Todo();
                $todo->subject = $request->subject;
                $todo->catatan = $request->catatan;
                $todo->todoFrom = Auth::user()->id;
                $todo->isConfirm = 0;
                $todo->save();
                $todo->domains()->attach($domainId);
                $todo->users()->attach(Auth::user()->id);
            }
        } else {
            $todo = new Todo();
            $todo->isConfirm = 0;
            $todo->subject = $request->subject;
            $todo->catatan = $request->catatan;
            $todo->todoFrom = Auth::user()->id;
            $todo->save();
            $todo->users()->attach(Auth::user()->id);
        }


        $namaDomainString = '';
        $index = 0;

        if ($request->has('domain')) {
            foreach ($domainName as $item) {
                $namaDomainString .= $index + 1 . '. ' . $item . '\n';
                $index++;
            }
        } else {
            $namaDomainString = '-';
        }
        $user = User::findOrFail(Auth::user()->id);

        $messages = 'Hi Admin , ' . $user->name . ' Membuat Tugas Baru !!
Nama Domain :
' . $namaDomainString . '
Subject :
' . $request->subject . '
Keterangan :
' . $request->catatan . '
Konfirmasi di client.webz.biz/todo Untuk Melanjutkan';

        $whatsapp = new Woowa();
        $response =  $whatsapp->sendWhatsapp($admin, $messages);
        return redirect()->back()->with(['success' => 'Todo berhasil ditambahkan']);
    }
    public function update(Request $request, Todo $todo)
    {
        if ($request->domain === null) {
            $request->request->remove('domain');
        }
        $labels = $request->input('labels', []);
        if ($request->has('domain')) {
            $domains = $request->input('domain');
            $domain = Domain::findOrFail($domains);
            $todo->domains()->sync($domain);
        }
        $todo->point = $request->point;
        $todo->subject = $request->subject;
        $todo->catatan = $request->catatan;
        $todo->save();
        $todo->label()->syncWithoutDetaching($labels);
        $todo->users()->sync($request->user);


        if ($request->has('sendwa')) {
            $namaDomainString = '';
            $index = 0;

            if ($request->has('domain')) {
                $namaDomainString .= $index + 1 . '. ' . $domain->nama_domain . '\n';
                $index++;
            } else {
                $namaDomainString = '-';
            }
            $user = [];
            foreach ($request->user as $users) {
                $user[] = User::findOrFail($users);
            }
            foreach ($user as $item) {
                $messages = 'Hi ' . $item->name . ' , Terdapat Perubahan Pada Todo !!
Nama Domain :
' . $namaDomainString . '
Subject :
' . $request->subject . '
Keterangan :
' . $request->catatan;
                // $whatsapp = new Rapiwha();
                $whatsapp = new Woowa();
                // $whatsapp = new Whatsapp();
                $response =  $whatsapp->sendWhatsapp($item->no_hp, $messages);
            }
        }

        return redirect()->route('todo.index')->with(['success' => 'Todo berhasil Diubah']);
    }

    public function changeNote(Request $request)
    {
        $request->validate([
            'catatan' => 'required|string',
            'todo_id' => 'required|integer',
        ]);

        $catatan = $request->input('catatan');
        $todoId = $request->input('todo_id');

        $todo = Todo::find($todoId);

        if (!$todo) {
            return response()->json(['error' => 'Tugas tidak ditemukan'], 404);
        }

        $todo->catatan = $catatan;
        $todo->save();

        // Response sukses
        return response()->json(['message' => 'Perubahan berhasil disimpan'], 200);
    }
    public function changeSubject(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'todo_id' => 'required|integer',
        ]);

        $subject = $request->input('subject');
        $todoId = $request->input('todo_id');

        $todo = Todo::find($todoId);

        if (!$todo) {
            return response()->json(['error' => 'Tugas tidak ditemukan'], 404);
        }

        if ($todo->isConfirm == false) {
            $todo->subject = $subject;
            $todo->save();
            return response()->json(['message' => 'Perubahan berhasil disimpan'], 200);
        } else {
            return response()->json(['error' => 'Tidak dapat Mengubah Todo yang sudah di konfirmasi']);
        }
    }
    public function changeStatus(Request $request)
    {
        $status = $request->input('status');
        $id = $request->input('id');

        if ($status == 0) {
            $stat = 'todo';
        } elseif ($status == 1) {
            $stat = 'doing';
        } elseif ($status = 2) {
            $stat = 'done';
        }

        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['error' => 'Tugas tidak ditemukan'], 404);
        }

        $todo->status = $stat;
        $todo->save();
        return response()->json(['message' => 'Perubahan berhasil disimpan ke ' . $stat], 200);
    }
    public function updateContainerTodo()
    {
        $authUserId = Auth::id();
        $domainsTodo = Domain::whereHas('todos', function ($query) use ($authUserId) {
            $query->whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', 'todo');
        })->get();
        $todos = Todo::where('user_id', $authUserId);
        return view('master.todo.container1', compact('domainsTodo', 'todos'));
    }
    public function updateContainerDoing()
    {
        $authUserId = Auth::id();
        $domainsDoing = Domain::whereHas('todos', function ($query) use ($authUserId) {
            $query->whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', 'doing');
        })->get();
        return view('master.todo.containerDoing', compact('domainsDoing'));
    }
    public function updateContainerDone()
    {
        $authUserId = Auth::id();
        $domainsDone = Domain::whereHas('todos', function ($query) use ($authUserId) {
            $query->whereHas('users', function ($subquery) use ($authUserId) {
                $subquery->where('user_id', $authUserId);
            })->where('status', 'done');
        })->get();
        return view('master.todo.containerDone', compact('domainsDone'));
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with(['success' => 'Todo Berhasil Dihapus']);
        // return response()->json(['success' => 'Todo deleted successfully.']);
    }
    public function destroy2(Todo $todo)
    {
        $todo->delete();
        return response()->json(['success' => 'Todo deleted successfully.']);
    }
    public function getDone()
    {
        $authUserId = Auth::id();
        $data = Todo::whereHas('users', function ($subquery) use ($authUserId) {
            $subquery->where('user_id', $authUserId);
        })->where('status', 'done')->where('isConfirm', true)->get();
        return response()->json($data);
    }
    public function postDone(Request $request)
    {
        $admin = env('WHATSAPP_ADMIN');
        $subject = '';
        $index = 0;
        foreach ($request->deleteTodo as $item) {
            $todo = Todo::findOrFail($item);
            // $todo->status = 'deleted';
            // $todo->doneAt = Carbon::now();
            $subject .=  $index + 1 . '. ' . $todo->subject . '\n'
                . $todo->catatan . '\n \n';
            $index++;
            $todo->save();
        }
        // dd($subject);
        $user = User::findOrFail(Auth::user()->id);
        $messages = 'Hi Admin , ' . $user->name . ' Telah Melakukan Submit To Do List !!

Subject :

' . $subject;

        $whatsapp = new Woowa();
        $response =  $whatsapp->sendWhatsapp($admin, $messages);
        return redirect()->back()->with(['success' => 'Todo Berhasil Di Submit']);
    }
    public function piechart(User $user)
    {
        $todoCount = $user->todos()->where('status', 'todo')->count();
        $doingCount = $user->todos()->where('status', 'doing')->count();
        $doneCount = $user->todos()->where('status', 'done')->count();

        $response = [
            'labels' => ['Todo', 'Doing', 'Done'],
            'data' => [$todoCount, $doingCount, $doneCount],
        ];

        return response()->json($response);
    }
    public function getAllPieChart()
    {
        $users = User::where('isSupport', true)->where('isAdmin', false)->get();

        $chartData = [];
        $filter = Carbon::now()->format('Y-m');


        foreach ($users as $user) {
            $todoCount = $user->todos()->where('status', 'todo')->count();
            $doingCount = $user->todos()->where('status', 'doing')->count();
            $doneCount = $user->todos()->where('status', 'done')->count();

            $chartData[] = [
                'point' => $user->todos()->where('status', 'deleted')->whereMonth('doneAt', '=', date('m', strtotime($filter)))
                    ->whereYear('doneAt', '=', date('Y', strtotime($filter)))->get(),
                'user' => $user,
                'labels' => ['Todo', 'Doing', 'Done'],
                'data' => [$todoCount, $doingCount, $doneCount],
                'month' => $filter
            ];
        }

        return response()->json($chartData);
    }

    public function todosConfirm(Request $request)
    {
        $ids = $request->confirmTodo;

        if ($request->has('decline')) {
            foreach ($ids as $id) {
                $todo = Todo::findOrFail($id);
                $todo->isConfirm = true;
                $todo->point = 0;
                $todo->save();
            }
        } else {
            foreach ($ids as $id) {
                $todo = Todo::findOrFail($id);
                $todo->isConfirm = true;
                $todo->save();
            }
        }

        return redirect()->back()->with(['success' => 'Berhasil Mengonfirmasi Todo']);
    }

    public function getPoint(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->input('start')));
        $end = date('Y-m-d', strtotime($request->input('end')));

        $data = User::where('isSupport', true)
            ->where('isAdmin', false)
            ->whereHas('todos', function ($query) use ($start, $end) {
                $query->where('status', 'deleted')
                    ->whereBetween('doneAt', [$start, $end]);
            })
            ->with(['todos' => function ($query) use ($start, $end) {
                $query->where('status', 'deleted')
                    ->whereBetween('doneAt', [$start, $end]);
            }])
            ->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            <a  style="color: #171dd4c4;" href="/todo/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                            </a>
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function getPointUser(User $user, $start, $end, Request $request)
    {
        return view('master.todo.reportUser', compact('start', 'end', 'user'));
    }
    public function getPointUsers(User $user, $start, $end, Request $request)
    {
        $data = $user->todos()->where('status', 'deleted')->whereBetween('doneAt', [$start, $end])->with('domains', 'from')->get();
        $point =  $user->todos()->whereBetween('doneAt', [$start, $end])->sum('point');
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <div class="flex items-center justify-center gap-2">
                            <a  style="color: #171dd4c4;" href="/todo/' . $row->id . '/edit/" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="m-3 editProduct fa-solid fa-lg fa-pen ">
                            </a>
                            <a style="color: #a80404d1;" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="fa-regular fa-trash-can fa-xl deleteProduct">
                            </a>
                        </div>
                        ';
                    return $btn;
                })
                ->addColumn('total', function ($row) use ($user, $start, $end) {
                    $query = $user->todos()->whereBetween('doneAt', [$start, $end]);

                    if ($query->exists()) {
                        $total = $query->sum('point');
                        return $total;
                    } else {
                        return 0;
                    }
                })


                ->rawColumns(['action', 'total'])
                ->make(true);
        }
        return $point;
    }
    public function calendarIndex()
    {
        $user = User::where('isSupport', true)->where('isAdmin', false)->get();
        $todo = Todo::where('status', 'deleted')->get();
        return view('master.todo.calendar', compact('user', 'todo'));
    }

    public function calendarGet(User $user)
    {
        $users = User::where('isSupport', true)->where('isAdmin', false)->get();
        $todo = $user->todos()->where('status', 'deleted')->get();
        return response()->json($todo);
    }
    public function viewReport()
    {
        $user = Auth::user();
        $start = date('Y-m-01');
        $end = date('Y-m-t');
        return view('master.todo.reportUser', compact('start', 'end', 'user'));
    }
}
