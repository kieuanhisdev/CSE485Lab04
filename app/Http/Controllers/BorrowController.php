<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $borrows = Borrow::all();
        // $borrows = Borrow::orderBy('updated_at', 'desc')->paginate(5); //

        //Query Builder
        $borrows = DB::table('borrows')
            ->join('books', 'borrows.book_id', '=', 'books.id') // Sử dụng book_id
            ->join('readers', 'borrows.reader_id', '=', 'readers.id') // Sử dụng reader_id
            ->select(
                'borrows.id as id',
                'readers.name as docgia',
                'books.name as tensach',
                'borrows.borrow_date as ngaymuon',
                'borrows.return_date as ngaytra',
                'borrows.status as trangthai',
                'borrows.updated_at'
            )
            ->orderBy('borrows.updated_at', 'DESC')
            ->paginate(10);


        return view('borrow.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $borrows = Borrow::all();
        $books = Book::all();
        $readers = Reader::all();
        return view('borrow.create', compact('books', 'readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
            'status' => 'required|in:0,1',
        ]);

        // Lấy book_id từ request
        $bookId = $request->input('book_id');

        // Tìm sách và giảm số lượng
        $book = Book::findOrFail($bookId);
        $book->quantity = $book->quantity - 1;
        $book->save();

        // Tạo bản ghi mượn sách
        Borrow::create([
            'reader_id' => $request->input('reader_id'),
            'book_id' => $request->input('book_id'),
            'borrow_date' => $request->input('borrow_date'),
            'return_date' => $request->input('return_date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('borrow.index')->with('success', 'Successfully added.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
        return view('borrow.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
        $readers = Reader::all();
        $books = Book::all();
        return view('borrow.edit', compact('borrow', 'readers', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateStatus(string $id)
    {
        // Tìm bản ghi mượn sách
        $borrow = Borrow::findOrFail($id);

        // Lấy thông tin sách từ borrow record
        $book = Book::findOrFail($borrow->book_id);

        // Tăng số lượng sách vì sách đã được trả
        $book->quantity = $book->quantity + 1;
        $book->save();

        // Cập nhật trạng thái mượn sách thành đã trả
        $borrow->update(['status' => 1]);

        return redirect()->route('borrow.index')->with('success', 'Return book successfully');
    }


    public function history(Borrow $borrow)
    {
        // Lấy thông tin độc giả từ Borrow
        $reader = Reader::findOrFail($borrow->reader_id);
        // Lấy lịch sử mượn trả sách của độc giả
        $borrows = Borrow::where('reader_id', $borrow->reader_id)->orderBy('borrow_date', 'desc')->get();
        // Trả về view với dữ liệu
        return view('borrow.history', compact('reader', 'borrows'));
    }



    public function update(Request $request, Borrow $borrow)
    {
        //
        $borrow = Borrow::findOrFail($borrow->id);
        $borrow->update([
            'reader_id' => $request->input('reader_id'),
            'book_id' => $request->input('book_id'),
            'borrow_date' => $request->input('borrow_date'),
            'return_date' => $request->input('return_date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('borrow.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
        $borrow->delete();

        return redirect()->route('borrow.index')->with('success', 'Successfully deleted!');
    }
}
