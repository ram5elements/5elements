<?php namespace App\Http\Controllers;

use App\Model\Sub_user\DO_Entry;
use Illuminate\Http\Request;
use App\Model\Admin\MinesDetail;
use App\Model\Admin\PartyDetail;
use App\Model\Admin\Liftner;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\User;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Http\Requests;


class AdminController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public  function current_user()
    {
        $user_data=Session::get('user_data');
        $user_id=$user_data->user_id;
        return $user_id;
    }
    public function Dashboard()
    {
        return view('admin.dashboard');
    }
    public function Party()
    {
        $user_id = $this->current_user();
        //dd($user_id);
        return view('admin.add_party', compact('user_id'));
    }
    public function Add_Party(PartyDetail $detail, Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required', 'person_name' => 'required',
            'address' => 'required', 'mobile_no' => 'required',
        ]);
        $detail->create($request->all());
        return Redirect::back()->with('message', 'Data Inserted Successfully');
    }
    public function Party_List(PartyDetail $partyDetail)
    {
        $partyDetail = $partyDetail::all();
        return view('admin.view_party', compact('partyDetail'));
    }
    public function Mines()
    {
        $user_id = $this->current_user();
        return view('admin.add_mines', compact('user_id'));
    }
    public function Add_Mines(MinesDetail $detail, Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required', 'person_name' => 'required',
            'address' => 'required', 'mobile_no' => 'required',
        ]);
        $detail->create($request->all());
        return Redirect::back()->with('message', 'Data Inserted Successfully');
    }
    public function Mines_List(MinesDetail $minesDetail)
    {
        $minesDetail = $minesDetail::all();
        return view('admin.view_mines',compact('minesDetail'));
    }
    public function User()
    {
        $user_id = $this->current_user();
        return view('admin.create_user', compact('user_id'));
    }
    public function Create_New_User(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255','address' => 'required',
            'email' => 'required|email|max:255|unique:admin',
            'user_type' => 'required','mobile_no' =>  'required',
            'password' => 'required','zone' => 'required',
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->user_type = $request['user_type'];
        $user->address = $request['address'];
        $user->mobile_no = $request['mobile_no'];
        $user->alt_mobile_no = $request['alt_mobile_no'];
        $user->zone = $request['zone'];
        $user->status = $request['status'];
        $user->Create_by = $request['Create_by'];
        $user->status = $request['status'];
        $user->save();
        return Redirect::back()->with('message', 'Data Inserted Successfully');
    }
    public function User_List(UserDetail $userDetail)
    {
        $userDetail = $userDetail::all();
        return view('admin.view_user',compact('userDetail'));
    }


    public  function Add_liftner()
    {   $user_id = $this->current_user();
        return view('admin.add_liftner', compact('user_id'));
    }
    public function Add_new_liftner(Request $request,Liftner $liftner)
    {
        $this->validate($request, [
            'liftner_name' => 'required', 'person_name' => 'required',
            'address' => 'required', 'mobile_no' => 'required',
        ]);
        $liftner->create($request->all());
        return Redirect::back()->with('message', 'Data Inserted Successfully');
    }

    public function View_liftner(Liftner $liftner)
    {
        $liftner = $liftner::all();
        return view('admin.view_liftner',compact('liftner'));
    }
    public function Add_product(Category $category ,Product $product)
    {
        $category = $category::all();
        $category1=$product->where('category_id','1')->get();
        $category2=$product->where('category_id','2')->get();
        $category3=$product->where('category_id','3')->get();
        $category4=$product->where('category_id','4')->get();
        $category5=$product->where('category_id','5')->get();
        return view('admin.product_list',compact('category','category1','category2','category3','category4','category5'));
    }
    public function Add_product_item(Category $category)
    {
        $category = $category::all();
        return view('admin.add_product',compact('category'));
    }

    public function Product_Add(Product $product,Request $request)
    {
        $product::create($request->all());
        return redirect('admin/add_product_item')->with('message', 'Product Add Sucessfully..');
    }
    public function View_Product(Category $category ,Product $product)
    {
        $category = $category::all();
        $category1=$product->where('category_id','1')->get();
        $category2=$product->where('category_id','2')->get();
        $category3=$product->where('category_id','3')->get();
        $category4=$product->where('category_id','4')->get();
        $category5=$product->where('category_id','5')->get();
        return view('admin.product_list',compact('category','category1','category2','category3','category4','category5'));
    }
    public function View_Purchase()
    {
        $do_data= DO_Entry::all();
        return view('admin.view_purchase',compact('do_data'));
    }
    public function View_Stock(Category $category ,Product $product)
    {    $category = $category::all();
        $category1=$product->where('category_id','1')->get();
        $category2=$product->where('category_id','2')->get();
        $category3=$product->where('category_id','3')->get();
        $category4=$product->where('category_id','4')->get();
        $category5=$product->where('category_id','5')->get();
        return view('admin.stock',compact('category','category1','category2','category3','category4','category5'));

    }
    public function View_Sales()
    {
        return view('admin.view_sales');
    }
    public function View_Payments()
    {
        return view('admin.view_payment');
    }
    public function Report_Section()
    {
        return view('admin.report');
    }

}
