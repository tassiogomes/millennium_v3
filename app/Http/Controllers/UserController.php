<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'Usuário não encontrado!');
        }

        return view('edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('home')->with('error', 'Usuário não encontrado!');
        }

        // Atualize os dados do usuário com base nos dados enviados no $request
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->id_tipo_user = $request->input('id_tipo_user');
        // Mais campos a serem atualizados, se necessário

        $user->save();

        return redirect()->route('home')->with('success', 'Usuário atualizado com sucesso!');
    }

    

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('home')->with('error', 'Usuário não encontrado!');
        }

        $user->delete();

        return redirect()->route('home')->with('success', 'Usuário excluído com sucesso!');
    }
}

