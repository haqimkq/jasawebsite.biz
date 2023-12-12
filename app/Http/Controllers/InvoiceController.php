<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Invoice;
use App\Models\InvoiceDomain;
use App\Models\InvoicePelanggan;
use App\Models\ItemInvoice;
use App\Models\ItemInvoiceDomain;
use App\Models\ItemInvoicePelanggan;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class InvoiceController extends Controller
{
    public function pdf()
    {
        $dompdf = new Dompdf();

        $html = view('pdf')->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->stream("nama_file.pdf");
    }

    public function invoiceCreate()
    {
        $id = IdGenerator::generate(['table' => 'invoices', 'field' => 'nomor_invoice', 'length' => 12, 'prefix' => 'INV-' . date('ymd')]);
        $today = Carbon::today();
        return view('master.invoice.invoice', compact('today', 'id'));
    }
    public function invoiceStore(Request $request)
    {
        $validasi = $request->validate(['nomor_invoice' => 'unique:invoices,nomor_invoice']);
        $nomor_invoice = $request->input('nomor_invoice');
        $bill_date = $request->input('bill_date');
        $due_date = $request->input('due_date');
        $nama_penerima = $request->input('nama_penerima');
        $nama_perusahaan = $request->input('nama_perusahaan');
        $item = $request->input('item');
        $logo = $request->file('logo');
        // dd($request);

        if ($request->hasFile('logo')) {
            $nama_file = date('YmdHi') . $logo->getClientOriginalName();
            $logo->move('storage/images/logo/', $nama_file);
            $logo = $nama_file;
            $file_path = base64_encode(file_get_contents(public_path('/storage/images/logo/' . $logo)));
        } else {
            $file_path = base64_encode(file_get_contents(public_path('/storage/images/logo/logo.png')));
        }

        $html = view('master.invoice.pdf', compact(
            'nomor_invoice',
            'bill_date',
            'due_date',
            'nama_penerima',
            'nama_perusahaan',
            'item',
            'file_path'
        ))->render();

        if ($request->hasFile('logo')) {
            unlink(public_path('/storage/images/logo/' . $logo));
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfFileName = $nomor_invoice . ".pdf";

        // Save the PDF to a directory on the server
        $pdfFilePath = public_path('storage/pdfs/' . $pdfFileName);
        file_put_contents($pdfFilePath, $dompdf->output());

        $invoice = new Invoice();
        $invoice->nama = $nama_penerima;
        $invoice->file = $pdfFileName;
        $invoice->nomor_invoice = $nomor_invoice;
        $invoice->bill_date = $bill_date;
        $invoice->due_date = $due_date;
        $invoice->nama_perusahaan = $nama_perusahaan;
        $invoice->save();
        foreach ($item as $itemData) {
            $itemModel = new ItemInvoice();
            $itemModel->invoice_id = $invoice->id;
            $itemModel->name = $itemData['name'];
            $itemModel->quantity = $itemData['qty'];
            $itemModel->harga = $itemData['price'];
            $itemModel->save();
        }


        return $dompdf->stream($pdfFileName);
    }

    public function index()
    {
        $invoice = Invoice::with('item')->get();
        $pelanggan = InvoicePelanggan::with('pelanggan', 'item')->get();
        $domain = InvoiceDomain::with('domain', 'item')->get();
        return view('master.invoice.index', compact('invoice', 'pelanggan', 'domain'));
    }

    public function pelangganInvoice(Pelanggan $pelanggan)
    {
        $cek = Pelanggan::with('invoice_pelanggan')->get();
        $id = IdGenerator::generate(['table' => 'invoice_pelanggans', 'field' => 'nomor_invoice', 'length' => 12, 'prefix' => 'INV-P' . date('ymd')]);
        $today = Carbon::today();
        return view('master.invoice.pelanggan', compact('today', 'id', 'pelanggan', 'cek'));
    }
    public function domainInvoice(Domain $domain)
    {
        $id = IdGenerator::generate(['table' => 'invoice_domains', 'field' => 'nomor_invoice', 'length' => 12, 'prefix' => 'INV-D' . date('ymd')]);
        $today = Carbon::today();
        $expiredDate = date('Y-m-d', strtotime($domain->tanggal_expired . '+1 year'));
        return view('master.invoice.domain', compact('today', 'id', 'domain', 'expiredDate'));
    }

    public function invoicePelangganStore(Request $request)
    {

        $validasi = $request->validate(['nomor_invoice' => 'unique:invoice_pelanggans,nomor_invoice']);
        $nomor_invoice = $request->input('nomor_invoice');
        $bill_date = $request->input('bill_date');
        $due_date = $request->input('due_date');
        $nama_penerima = $request->input('nama_penerima');
        $nama_perusahaan = $request->input('nama_perusahaan');
        $item = $request->input('item');
        $logo = $request->file('logo');
        $id_pelanggan = $request->input('id_pelanggan');
        // dd($request);

        if ($request->hasFile('logo')) {
            $nama_file = date('YmdHi') . $logo->getClientOriginalName();
            $logo->move('storage/images/logo/', $nama_file);
            $logo = $nama_file;
            $file_path = base64_encode(file_get_contents(public_path('/storage/images/logo/' . $logo)));
        } else {
            $file_path = base64_encode(file_get_contents(public_path('/storage/images/logo/logo.png')));
        }

        $html = view('master.invoice.pdf', compact(
            'nomor_invoice',
            'bill_date',
            'due_date',
            'nama_penerima',
            'nama_perusahaan',
            'item',
            'file_path'
        ))->render();

        if ($request->hasFile('logo')) {
            unlink(public_path('/storage/images/logo/' . $logo));
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfFileName = $nomor_invoice .  ".pdf";

        // Save the PDF to a directory on the server
        $pdfFilePath = public_path('storage/pdfs/' . $pdfFileName);
        file_put_contents($pdfFilePath, $dompdf->output());

        $invoice = new InvoicePelanggan();
        $invoice->file = $pdfFileName;
        $invoice->id_pelanggan = $id_pelanggan;
        $invoice->nomor_invoice = $nomor_invoice;
        $invoice->bill_date = $bill_date;
        $invoice->due_date = $due_date;
        $invoice->nama_penerima = $nama_penerima;
        $invoice->nama_perusahaan = $nama_perusahaan;
        $invoice->save();
        foreach ($item as $itemData) {
            $itemModel = new ItemInvoicePelanggan();
            $itemModel->invoice_pelanggan_id = $invoice->id;
            $itemModel->name = $itemData['name'];
            $itemModel->quantity = $itemData['qty'];
            $itemModel->harga = $itemData['price'];
            $itemModel->save();
        }


        return $dompdf->stream($pdfFileName);
    }
    public function invoiceDomainStore(Request $request)
    {

        $validasi = $request->validate(['nomor_invoice' => 'unique:invoice_domains,nomor_invoice']);
        $nomor_invoice = $request->input('nomor_invoice');
        $bill_date = $request->input('bill_date');
        $due_date = $request->input('due_date');
        $nama_penerima = $request->input('nama_penerima');
        $nama_perusahaan = $request->input('nama_perusahaan');
        $item = $request->input('item');
        $logo = $request->file('logo');
        $id_domain = $request->input('id_domain');
        $nama_domain = $request->input('nama_domain');
        // dd($request);

        if ($request->hasFile('logo')) {
            $nama_file = date('YmdHi') . $logo->getClientOriginalName();
            $logo->move('storage/images/logo/', $nama_file);
            $logo = $nama_file;
            $file_path = base64_encode(file_get_contents(public_path('/storage/images/logo/' . $logo)));
        } else {
            $file_path = base64_encode(file_get_contents(public_path('/storage/images/logo/logo.png')));
        }

        $html = view('master.invoice.pdfDomain', compact(
            'nomor_invoice',
            'bill_date',
            'due_date',
            'nama_penerima',
            'nama_perusahaan',
            'item',
            'file_path',
            'nama_domain'
        ))->render();

        if ($request->hasFile('logo')) {
            unlink(public_path('/storage/images/logo/' . $logo));
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfFileName = $nomor_invoice .  ".pdf";

        // Save the PDF to a directory on the server
        $pdfFilePath = public_path('storage/pdfs/' . $pdfFileName);
        file_put_contents($pdfFilePath, $dompdf->output());

        $invoice = new InvoiceDomain();
        $invoice->file = $pdfFileName;
        $invoice->id_domain = $id_domain;
        $invoice->nomor_invoice = $nomor_invoice;
        $invoice->bill_date = $bill_date;
        $invoice->due_date = $due_date;
        $invoice->nama_penerima = $nama_penerima;
        $invoice->nama_perusahaan = $nama_perusahaan;
        $invoice->nama_domain = $nama_domain;
        $invoice->save();
        foreach ($item as $itemData) {
            $itemModel = new ItemInvoiceDomain();
            $itemModel->invoice_domain_id = $invoice->id;
            $itemModel->keterangan = $itemData['name'];
            $itemModel->tanggal_awal = $itemData['periode_awal'];
            $itemModel->tanggal_akhir = $itemData['periode_akhir'];
            $itemModel->quantity = $itemData['qty'];
            $itemModel->harga = $itemData['price'];
            $itemModel->save();
        }

        return $dompdf->stream($pdfFileName);
    }
    public function invdelete($inv)
    {
        $invoice = Invoice::findOrFail($inv);
        $file_path = public_path('storage/pdfs/' . $invoice->file);
        unlink($file_path);
        $invoice->delete();
        // dd($invoice);
        return redirect()->back()->with(['success' => 'Invoice Berhasil Dihapus']);
    }
    public function invpelanggandelete($inv)
    {
        $invoice = InvoicePelanggan::findOrFail($inv);
        $file_path = public_path('storage/pdfs/' . $invoice->file);
        unlink($file_path);
        $invoice->delete();
        // dd($invoice);
        return redirect()->back()->with(['success' => 'Invoice Berhasil Dihapus']);
    }
    public function invdomaindelete($inv)
    {
        $invoice = InvoiceDomain::findOrFail($inv);
        $file_path = public_path('storage/pdfs/' . $invoice->file);
        unlink($file_path);
        $invoice->delete();
        // dd($invoice);
        return redirect()->back()->with(['success' => 'Invoice Berhasil Dihapus']);
    }
}
