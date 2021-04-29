

@extends('Poats.layout') {{-- //cssكانا نقول كامبيور نريد نستخدم
  تنسيقات الصفحة الرئيسية
  لرسم هذا الكود اي استدعاء  --}}
@section('content')  {{--  إذا وجد مكان في صفحة الرئيسية اسمة كونتت حط هذي شفرة  --}}
{{-- أي نحط فية محتوى الذي نريد دمجة مع صفحة الرئيسية  --}}

@if (count($Posts))
{{-- دالة كاونت تعرف لك إذا في مقالات اما لا --}}
@foreach ($Posts as $poat) 

     <div class="blog-post">
       <h2 style="    font-family: 'Cairo', sans-serif;" class="blog-post-title">{{$poat->title}}</h2>
       <p class="blog-post-meta"> {{\Carbon\Carbon::parse($poat->created_at)->diffForHumans()}} <a href="#">{{$poat->user->name}}</a></p>
       <p>
         {{$poat->excerpt}} 
         {{--  mb_substr دالة تحدد لك كم يعرض لك احرف من نص --}}
         <div > <a class="btn btn-danger" href="/cms/public/posts/{{$poat->id}}">المزيد</a></div>
               {{--    سيتم تعريف هذا في web .php --}}
       </p>
     </div><!-- /.blog-post -->

@endforeach

@else
<div class="alert alert-success w-100 " role="alert">
لاتوجد مقالات !!
</div>
@endif

@endsection {{-- الانتهاء هنا لمحتوى  --}}
{{-- هذي الحركة حتى يسهل عليك ترتيب الكود --}}
@section('footer')
<footer class="blog-footer">
   <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo"></a>.</p>
   <p>
     <a href="#">Back to top</a>
   </p>
 </footer>

@endsection