<?php namespace App\Http\Controllers;

use App\Model\Admin\Liftner;
use App\Model\Admin\MinesDetail;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Sub_user\DO_payment;
use Illuminate\Support\Facades\Input;
use App\Model\Sub_user\DO_Entry;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use App\Model\Sub_user\Inword_entry;
use App\Model\Sub_user\PO_Entry;
use App\Model\Sub_user\Outward_Entry;
use App\Model\Sub_user\Inward_Party_Entry;
use  App\Model\Sub_user\Demo;
use  App\Model\Sub_user\Add_Payment;
use  App\Model\Sub_user\party_details;
use DateTime;
use DB;


class UserController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public  function current_user()
    {   if(Session::has('user_data')){
        $user_data=Session::get('user_data');
        $user_id=$user_data->user_id;
        return $user_id;

    }else {
        return Redirect::back();
    }
    }
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function Insert_Delivery(MinesDetail $minesDetail,Category $category,Liftner $liftner)
    {   $category =$category::all();
        $minesDetail=$minesDetail::all();
        $liftner =$liftner::all();
        $user_id=$this->current_user();
        return view('user.insert_delivery_order',compact('minesDetail','category','user_id','liftner'));
    }

    // ajax function for Gat_Product_list
    public  function Gat_Product_list(Product $product)
    {
        $category_id= Input::get('category_id');
        $product_list=$product::where('category_id',$category_id)->get();
        return json_encode(['product_list'=>$product_list]);
    }
    // DO_Entry Form submittion
    public  function DO_Entry(DO_Entry $DO_Entry,Request $request)
    {
        $enquiry_id=DO_Entry::create($request->all());
        return Redirect::back()->with('message', 'DO Inserted Successfully');
    }
    public function View_Delivery( DO_Entry $DO_Entry)
    {
        $DO_Entry=DO_Entry::all();
        return view('user.view_delivery',compact('DO_Entry'));
    }
    public function InWard_entry(DO_Entry $DO_Entry)
    {
        $DO_Entry=$DO_Entry::all();
        $user_id=$this->current_user();
        return view('user.inward',compact('user_id','DO_Entry'));
    }

    public function Gat_DO_Data(DO_Entry $DO_Entry,Category $category,Product $product)
    {
        $do_entry_id=Input::get('do_entry_id');
        $do_data=$DO_Entry::where('do_entry_id',$do_entry_id)->first();
        $category_id=$do_data->category_id;
        $product_category_id=$do_data->category_product_id;

        $category_name=$category::where('category_id',$category_id)->first();

        $product_name=$product::where('category_product_id',$product_category_id)->first();
        return json_encode(['DO_Data'=>$do_data,'category_name'=>$category_name,'product_name'=>$product_name]);
    }
    //Inward_submit form submitiion
    public  function Inward_submit(Request $request)
    {
         $inward_entry_id = Inword_entry::create($request->all())->id;
        $inward_entry = Inword_entry::where('inward_entry_id',$inward_entry_id)->first();
        return view('user.InWard_receipt',compact('inward_entry'));
    }
    public function Stock_Detail(Category $category ,Product $product)
    {  $category = $category::all();
        $category1=$product->where('category_id','1')->get();
        $category2=$product->where('category_id','2')->get();
        $category3=$product->where('category_id','3')->get();
        $category4=$product->where('category_id','4')->get();
        $category5=$product->where('category_id','5')->get();
        return view('user.stock_details',compact('category','category1','category2','category3','category4','category5'));
    }
    //Sales Module - Purchase order insert
    public function Purchase_Order(MinesDetail $minesDetail,Category $category)
    {
        $category =$category::all();
        $minesDetail=$minesDetail::all();
        $user_id=$this->current_user();
        return view('user.purchase_order',compact('minesDetail','category','user_id'));
    }
    public function PO_Entry(PO_Entry $PO_Entry,Request $request)
    {
        $enquiry_id=PO_Entry::create($request->all());
        return Redirect::back()->with('message', 'Data Inserted Successfully');
    }
    public function View_Sales(PO_Entry $PO_Entry)
    {
        $PO_Entry=PO_Entry::all();
        return view('user.view_sales',compact('PO_Entry'));
    }
    public function OutWard_entry(PO_Entry $PO_Entry)
    {
        $PO_Entry=$PO_Entry::all();
        $user_id=$this->current_user();
        return view('user.outward',compact('user_id','PO_Entry'));
    }
    public function Get_PO_Data(PO_Entry $PO_Entry,Category $category,Product $product)
    {
        $po_entry_id=Input::get('do_entry_id');
        $po_data=$PO_Entry::where('po_entry_id',$po_entry_id)->first();
        $category_id=$po_data->category_id;
        $product_category_id=$po_data->category_product_id;

        $category_name=$category::where('category_id',$category_id)->first();

        $product_name=$product::where('category_product_id',$product_category_id)->first();
        return json_encode(['DO_Data'=>$po_data,'category_name'=>$category_name,'product_name'=>$product_name]);
    }
	//outward submit
    public  function Outward_submit(Request $request)
    {
         $outward_entry_id = Outward_Entry::create($request->all())->id;
        $outward_entry = Outward_Entry::where('outward_entry_id',$outward_entry_id)->first();
        return view('user.oec_report',compact('outward_entry'));
    }
	
    public function View_DO_Payment(DO_payment $DO_payment)
    {
        $user_id=$this->current_user();
        $Do_payment=$DO_payment::where('inserted_by',$user_id)->get();
        return view('user.view_DO_payment',compact('Do_payment'));
    }
    public function DO_Payment()
    {   $user_id=$this->current_user();
        $inward_entry=Inword_entry::all();
        return view('user.DO_payment',compact('user_id','inward_entry'));
    }
    public  function Gat_Receipt_Data()
    {   $inward_entry_id=Input::get('inward_entry_id');
        $inward_entry=Inword_entry::where('inward_entry_id',$inward_entry_id)->first();
        return json_encode(['inward_data'=>$inward_entry]);
    }
    public function DO_Payment_insert(Request $request)
    {
       $data=DO_payment::create($request->all());
        return Redirect::back()->with('message', 'Data Inserted Successfully');
    }
    public function View_PO_Payment()
    {
        return view('user.view_PO_payment');
    }
    public function PO_Payment()
    {
        $user_id=$this->current_user();
        $outward_entry=Outward_Entry::all();
        return view('user.PO_payment',compact('outward_entry','user_id'));
    }
    public function Report_Section()
    {
        return view('user.report');
    }
    public function Invard_Check()
    {
        return view('user.inward_entry_check');
    }
	//my code InWard_PartyEntry for populating dropdown 
    public function InWard_PartyEntry(DO_Entry $DO_Entry)
    {
       $DO_Entry=$DO_Entry::all();
       $do_entry_id=$this->current_user();
        return view('user.InWard_Party_Entry',compact('user_id','DO_Entry'));
    }
	//myccc
	public function select_party(party_details $Party_details)
    {
        $Party_details=$Party_details::all();
       $company_name=$this->current_user();
        return view('user.Add_payment',compact('company_name','Party_details'));
    }
	  
//my code InWard_PartyEntry insert And Report Generation
    public  function InWardPartyEntrySubmit(Request $request)
    {
         $inward_party_id = Inward_Party_Entry::create($request->all())->id;
        $inward_party_entry = Inward_Party_Entry::where('inward_party_id',$inward_party_id)->first();
        return view('user.Inward_party_entry_receipt',compact('inward_party_entry'));
    }
 //my code view add payment
 public function Demo_Section()
    {
        return view('user.Add_payment');
    }
//my code Add_Payment insert & receipt generation
 public  function AddPaymentSubmit(Request $request)
    {
         $Party_Id = Add_Payment::create($request->all())->id;
        $addpayment = Add_Payment::where('Party_Id',$Party_Id)->first();
        return view('user.Add_payment_receipt',compact('addpayment'));
    }
	
	
    public function Demo(DO_Entry $DO_Entry)
    {
        $DO_Entry=$DO_Entry::all();
        $user_id=$this->current_user();
        return view('user.demo',compact('user_id','DO_Entry'));
    }

   
		

    
 public function outWard_PartyEntry(DO_Entry $DO_Entry)
    {
       $DO_Entry=$DO_Entry::all();
       $user_id=$this->current_user();
        return view('user.outward_entry_check',compact('user_id','DO_Entry'));
    }
	
	
	 public function OutWard_entry_checkdp(PO_Entry $PO_Entry)
    {
        $PO_Entry=$PO_Entry::all();
        $po_entry_id=$this->current_user();
        return view('user.outward_entry_check',compact('po_entry_id','PO_Entry'));
    }
//later use
    public  function Out_Word_Submit(Request $request)
    {
        $date=Input::get('do_date');
        $dateTime = new DateTime($date);
        $formatted_date=date_format($dateTime,'Y-m-d' );

       echo  DB::table('outward_entry_check')->insert([ 
			    'PartyName'=>Input::get('g_weight'),
                'Date'=>$formatted_date,
                'NextWeight'=>Input::get('t_weight'),
                'Product'=>Input::get('t_weight'),
                'VehicleNo'=>Input::get('net_weight'),
                'FreightCharge'=>Input::get('freight_charges'),
                'Weight'=> Input::get('Weight'),
				'Advance'=>Input::get('advanced'), 
                'Muneshiyana'=>Input::get('Muneshiyana'),
                'Other_Deduction'=>Input::get('Deduction'),
                'Remark'=>Input::get('remark'),
		]);
        return Redirect::back()->with('message', 'PO Inserted Successfully');
    
	
	}
	
	
	
}