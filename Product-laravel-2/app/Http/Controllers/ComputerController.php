<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;


class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::all();
        return view('computer.index', compact('computers'));
    }

    // Hiển thị form để tạo đề tài mới
    public function create()
    {
        return view('computer.create');
    }

    public function store(Request $request)
    {

        // Tạo một Computer mới
        Computer::create([
            'computer_name' => $request->computer_name,
            'model' => $request->model,
            'operating_system' => $request->operating_system,
            'processor' => $request->processor,
            'memory' => $request->memory,
            'available' => $request->available,
        ]);

        // Chuyển hướng về danh sách với thông báo thành công
        return redirect()->route('computer.index')->with('success', 'Thêm máy tính thành công!');
    }


    // Hiển thị chi tiết đề tài
    public function show($id)
    {
        // Tìm Computer theo ID, nếu không thấy thì báo lỗi 404
        $computer = Computer::findOrFail($id);

        // Trả về view và truyền dữ liệu máy tính sang
        return view('computer.show', compact('computer'));
    }


    // Hiển thị form để chỉnh sửa đề tài
    public function edit($id)
    {
        $computer = Computer::findOrFail($id);
        return view('computer.edit', compact('computer'));
    }

    // Cập nhật thông tin đề tài
    public function update(Request $request)
    {
        // Tìm Computer theo ID từ request
        $computer = Computer::findOrFail($request->id);
        // Cập nhật thông tin
        $computer->update($request->all());
        // Chuyển hướng về danh sách với thông báo
        return redirect()->route('computer.index')->with('success', 'Computer updated successfully!');
    }


    // Xóa đề tài
    public function destroy($id)
    {
        // Tìm máy tính bằng ID
        $computer = Computer::find($id);
        // Kiểm tra nếu máy tính tồn tại
        if ($computer) {
            // Xóa máy tính
            $computer->delete();
            // Chuyển hướng về trang danh sách máy tính (hoặc một route khác bạn muốn)
            return redirect()->route('computer.index')->with('success', 'Computer deleted successfully');
        }
        // Nếu máy tính không tồn tại, trả về lỗi
        return redirect()->route('computer.index')->with('error', 'Computer not found');
    }

}
