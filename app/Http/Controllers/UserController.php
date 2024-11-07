<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::select("
        SELECT
            a.id,
            (SELECT concat(nombre, ' ', apellido) FROM empleados b WHERE a.ci = b.ci) AS nombre,
            a.email
        FROM 
            users a");

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $empleados = Empleado::all(); // Obtener todos los empleados para el campo select
        return view('users.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci'=>'required|integer|exists:empleados,ci|unique:users,ci',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|min:8',
        ],[
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, utiliza otro.',
        ]);

        $user = new user();
        $user->ci = $request->ci;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Usuario registrado');
    }

    //******************************************** update a usuarios *****************************************/
    public function edit(User $user)
    {
        $empleados = Empleado::all(); // Obtener todos los empleados para el campo select en edición
        return view('users.edit', compact('user', 'empleados'));
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
           'ci'=>'required|integer|exists:empleados,ci|unique:users,ci,' . $user->id,
           'email' => 'required|string|email|unique:users,email,' . $user->id,
           'password'=>'nullable|string|min:8',
        ],[
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, utiliza otro.',
        ]);

        $data = $request->except('_token', '_method');

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        
        return redirect()->route('users.index')->with('success', 'Usuario actualizado');
    }

    //*******************************************************************************************************************/

    public function destroy(user $user)
    {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }

    //******************************************** configuración de usuario **********************************************/
    public function config(User $user)
    {
        $empleados = Empleado::all(); // Obtener todos los empleados para el campo select en edición
        return view('configuracion.index', compact('user', 'empleados'));
    }

    public function config_update(Request $request, User $user)
{
    // Verificar la contraseña actual ingresada
    if (!Hash::check($request->password_actual, $user->password)) {
        return redirect()->back()->withErrors(['password_actual' => 'La contraseña actual no coincide con nuestra base de datos.']);
    }

    // Validar los demás campos, asegurándonos de que las contraseñas nuevas coincidan
    $validatedData = $request->validate([
        'ci' => ['required', 'integer', 'exists:empleados,ci', Rule::unique('users')->ignore($user->id)],
        'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id)],
        'password' => ['nullable', 'string', 'min:8', 'confirmed'], // Se valida que coincidan con 'password_1'
    ],[
        'email.unique' => 'El correo electrónico ya está en uso. Por favor, utiliza otro.',
        'password.confirmed' => 'La nueva contraseña y la confirmación no coinciden.',
    ]);

    // Si se proporciona una nueva contraseña, actualizarla
    $data = $request->except('_token', '_method', 'password_1', 'password');

    if ($request->filled('password')) {
        // Si hay una nueva contraseña, cifrarla y actualizar
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);
    
    return redirect()->route('dashboard')->with('success', 'Usuario actualizado');
}

}
