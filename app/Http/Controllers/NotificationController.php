<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Nameserver;
use App\Models\Notification;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $notifUser = Notification::with('domain')
            ->where('notif_pelanggan', auth()->id())
            ->get();
        $notif = Notification::with('domain', 'pelanggan')->get();
        return view('notification', compact('notif', 'notifUser', 'pelanggan'));
    }

    public function notifread(Domain $domain)
    {
        $ns = Nameserver::all();
        $data = Pelanggan::all();
        return view('master.domain.edit', compact('data', 'domain', 'ns'));
    }

    public function editns(Request $request)
    {
        $request->validate(
            [
                'nameserver1' => 'required',
                'nameserver2' => 'required',
            ],
        );

        $notification = new Notification();
        $nama_domain = $request->nama_domain;
        $notification->nameserver = 'Saya Ingin Merubah Nameserver Domain ' . $nama_domain . ' ke ' . $request->nameserver1 . '-' . $request->nameserver2;
        $notification->isRead = 0;
        $notification->domain_id = $request->domain_id;
        $notification->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengirim Permintaan']);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        $notification->isRead = true;
        $notification->save();
        return redirect()->back();
    }
    public function markAsDone($id, $domain_id, $pelanggan_id)
    {
        // dd();
        $notification = Notification::find($id);
        $notification->isRead = true;
        $notification->save();

        $notif = new Notification();
        $notif->isAdmin = false;
        $notif->nameserver = 'Nameserver Domain Anda Telah Berhasil Diubah ';
        $notif->domain_id = $domain_id;
        $notif->notif_pelanggan = $pelanggan_id;
        $notif->save();

        return redirect()->back();
    }
    public function destroy($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->delete();
        return back();
    }
}
