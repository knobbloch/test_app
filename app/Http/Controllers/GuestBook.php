<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestbookEntry;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;

class GuestBook extends Controller
{
    public function get_all(Request $request)
    {
        $sortField = $request->get('sort', 'created_at'); 
        $sortOrder = $request->get('order', 'desc'); 
        $perPage = 5; 
        $page = $request->get('page', 1); 

        $validSortFields = ['user_name', 'email', 'created_at'];
        if (!in_array($sortField, $validSortFields)) {
            return response()->json(['error' => 'Invalid sort field'], 400);
        }

        // Получение записей с пагинацией
        $entries = GuestbookEntry::orderBy($sortField, $sortOrder)->paginate($perPage);

        return response()->json([
            'entries' => $entries->items(),
            'total_pages' => $entries->lastPage(),
            'current_page' => $entries->currentPage(), 
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string'
            //'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ipAddress = $request->ip(); 
        $userAgent = $request->header('User-Agent'); 

        $entry = GuestbookEntry::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'text' => $request->text,
            'ip_address' => $ipAddress, 
            'user_agent' => $userAgent
        ]);

        return response()->json($entry, 201);
    }

    public function delete($id)
    {
        $entry = GuestBookEntry::find($id);
        if ($entry) {
            $entry->delete();
            return response()->json(['message' => 'Запись удалена успешно.']);
        }
        return response()->json(['message' => 'Запись не найдена.'], 404);
    }

}

