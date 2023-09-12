<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Login 
    public function login()
    {
        return view('user.login');
    }

    // Show Register 
    public function register()
    {
        return view('user.register');
    }

    //Store User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'piority' => ['required']
        ]);

        // Set default piority if not provided
        $formFields['piority'] = 'user';

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    //User login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (auth()->attempt($formFields)) {
            $user = auth()->user();
            if ($user->piority === 'user') {
                $request->session()->regenerate();
                return redirect('/')->with('message', 'You are logged in!');
            } else if ($user->piority === 'admin') {
                return redirect('/admin');
            }
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    //Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logout!');
    }

    //Show user
    public function show()
    {
        $orders = Order::where('user_id', auth()->user()->id)
            ->latest()->get();
        foreach ($orders as $order) {
            $order['items'] =
                OrderDetail::where('order_id', $order->id)->count();
            //Convert fullname to vietnameses
            $jsonString = Shipping::where('order_id', $order->id)
                ->pluck('fullname');

            $decodedString = json_decode($jsonString, true, JSON_UNESCAPED_UNICODE);
            if (is_array($decodedString) && count($decodedString) > 0) {
                $order['fullname'] = $decodedString[0];
            } else {
                $order['fullname'] = '';
            }

            //Get telephone
            $order['telephone'] = Shipping::where('order_id', $order->id)
                ->pluck('telephone');
            $order['telephone'] = str_replace(['[', ']'], '', $order['telephone']);
            $order['telephone'] = trim($order['telephone'], '"');
        }
        return view('user.user', [
            'orders' => $orders
        ]);
    }

    //Show user
    public function adminShow()
    {
        return view('admin.home');
    }



    //Show user
    public function userShow()
    {
        return view('admin.user', [
            'users' => User::latest()->get()
        ]);
    }

    //Show form edit user
    public function editUser(User $user)
    {
        return view('admin.edit-user', [
            'user' => $user
        ]);
    }

    //Store user edited
    public function storeUser(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        // Set default piority if not provided
        $formFields['piority'] = 'user';

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user->update($formFields);

        return redirect('/admin/user');
    }

    //Show add user
    public function addUser()
    {
        return view('admin.add-user');
    }

    //Store new user
    public function addedUser(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
        ]);

        // Set default piority if not provided
        $formFields['piority'] = 'user';

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user = User::create($formFields);

        return redirect('/admin/user')->with('message', 'User created!');
    }

    //Delete User
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect('/admin/user')->with('message', 'User deleted!');
    }
}
