<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function danhsach(Request $request)
    {
        $tests = new Test; // tạo đối tượng cần filter

        $queries = []; // tạo danh sách truy vấn để lọc

        $columns = [
            'state', // mảng chứa các thuộc tính cần lọc
        ];

        foreach ($columns as $column) {
            if ($request->has($column)) { // nếu trên url có chứa tham số $column
                $tests = $tests->where($column, $request->get($column)); // thì dùng lênh where với giá trị tham số đó
                $queries[$column] = $request->get($column); // thêm giá trị tham số $column vào $queries
            }
        }

        // sort, tương tự ở trên
        if ($request->has('sort')) {
            $tests = $tests->orderBy('id', $request->get('sort'));
            $queries['sort'] = request('sort');
        }

        $tests = $tests->paginate(10)->appends($queries); // cái này mới ăn tiền nè

        return view('test', compact('tests')); // truyền $tests qua view
    }
}
