<?php

namespace App\Http\Controllers;
   /*      مهم المسارات */
use Illuminate\Http\Request;
use carbon\carbon;
use Illuminate\Support\Facades\DB;
use App\Post;
class Postscontroller extends Controller
{
    public function __construct()        //لعمل مصادقة لصفحة محدد لها وراجع درس إنشاء استمارة
    {
        $this->middleware('auth')->only('create' ,'sucess'); //نحن نريد مصادقة فقط من كنترول فقط تبع الانشاء مقاله


        //$this->middleware('auth')------------> لماتعمل كذا يعني اعمل مصادقة لجميع الطرق داخل المتحكم
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$poats2=$this-> getAllpoats();
         //$Posts=DB::table('posts')->latest()->get()
         $Posts= Post::latest()->get();
         $archives= $this->getArchives();
         return view('Poats.index' ,compact ('Posts' , 'archives'));
         /* compact تمرر بيانات دالة لفور اتش */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $archives= $this->getArchives();
        $method='post';
        $action= route('posts.store');
        return view('Poats.create' ,compact ( 'archives','method','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       /*  dd($request->all()); */ //OR dd($request->only('title' ,'body'));  لعمل أختبار لارسال البيانات من الاستمارة
        
       /* طريقة رقم واحد  */
            /*   $post = new Post();
                $post->title = $request->title;
                $post->body = $request->body;
                $post->excerpt = $request->excerpt;
                $post->is_published = (bool)$request->is_published;
                $post->user_id =$request->user_id;
                $post->save();
                return redirect('/posts'); */

                $this->validate($request,[         // هذي داله فلديت تتحقق من انه لابد ان يكون الحقول في الاستمارة لاتكون فاضية
                    'title' => 'required|max:150',    // كل ماتعملة هذي الدالة هي إعادة صفحة عندما تكون الحقول فاضية محدد في مصفوفة
                    'body' => 'required',              // الحد الاقصى للاحرف max:150
                    'excerpt' => 'required'

                ],
                [
                    'title.required'=>'إدخل عنوان المقالة',
                    'title.max'=>'عدد احرف العنوان اكثر من 150 حرف',
                    'body.required'=>'إدخل نص المقالة',
                    'excerpt.required'=>'إدخل مقتطف المقالة',
                ]
                );
                Post::create([  
                    'title'=>$request->title,
                    'body'=>$request->body,
                    'excerpt'=>$request->excerpt,
                    'is_published'=>(bool)$request->is_published,
                    'user_id'=>(bool)$request->user_id

                ]);
                return redirect('/posts'); 
     
                /* لكن عند استعمال هذا يجب عليك ان تحط  متغير فريبل الذي عبره بيعرف انه هذي الحقول الذي نضيفها امنة  */
                /* هذي متغير يكون في نموذج البيانات App/Post.php */
                /*  protected $fillable = [ 
                    'title', 'body', 'user_id','excerpt','is_published' , 'created_at' ,'update_at'        // لاستنثناء حقول علشان نعمل update 
                ]; */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$any_var=$this-> getAllpoats()[$id];
     /*    $post=DB::table('posts')->find($id); */
        $post=Post::findOrFail($id);
        $archives= $this->getArchives();
        //dd($id);
        return view('Poats.show',compact('post' ,'archives'));
        
      /*   foreach   اسم متغير الذي تمر علية البيانات من خلال poat */
      /* معرف في فور اتش key  لانة فقط تمرير البيانات عبر لمتغير   $id يمكنك تسمية أي متغير مش شرط  */ 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::find($id);
        $method='put';
        $action= route('posts.update' ,($id));
        $archives= $this->getArchives();
        return view('Poats.create' ,compact ( 'post' ,'archives' ,'method','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Post::find($id)->update($request->all());
        return redirect('/posts'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @paramint  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function archive($year , $month)
    {
        $Posts=\App\Post::whereYear('created_at',$year)->whereMonth('created_at',$month)->get();
        // index نفسة الذي في دالة  Posts  لازم يكون متغير 
        // دالة وير تشل متغيرين واحد العمود الذي نبحث فية والثاني القيمة مطلوب البحث عنها 
        $archives= $this->getArchives();
        return view('Poats.index' ,compact ('Posts' , 'archives'));
    }
    private function getAllpoats(){
        return [
               1=>[
                   "title"=>"نبذة",
                   "body"=>"اُختيرت الشارقة عاصمةً عالميّة للكتاب لعام 2019 تتويجاً لجهودها الحثيثة ومسيرتها في دعم مجالي الكتب والثقافة ونتيجةً لبرنامجها المبتكر الذي قدّمته المدينة إلى مبادرة منظمة الأمم المتحدة للتربية والعلوم والثقافة اليونسكو",
                   "auther"=>"علي",
            
                   "created_at"=>Carbon::CreateFromDate($year=2020,$month=7,$day=28)->diffForHumans(),
               ],
               2=>[
                   "title"=>"نبذة 
                   العالميّة",
                   "body"=>"اُختيرت الشارقة عاصمةً عالميّة للكتاب لعام 2019 تتويجاً لجهودها الحثيثة ومسيرتها في دعم مجالي الكتب والثقافة ونتيجةً لبرنامجها المبتكر الذي قدّمته المدينة إلى مبادرة منظمة الأمم المتحدة للتربية والعلوم والثقافة اليونسكو",
                   "auther"=>"علي",
                   "created_at"=>Carbon::CreateFromDate($year=2020,$month=7,$day=28)->diffForHumans(),
               ],  
            ];
    }

    private function  getArchives(){
        return \App\Post::selectRaw('MONTHNAME(created_at) month , MONTH(created_at) month_number, YEAR(created_at) year, COUNT(*) post_count')->groupBy('month' , 'month_number' ,'year')->orderBy('created_at')->get();
    }
     
    public function sucess (){
        $archives= $this->getArchives();
        return view('Poats.sucessfully' ,compact ( 'archives'));
    }

}
