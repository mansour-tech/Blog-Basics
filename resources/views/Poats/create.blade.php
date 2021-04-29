@extends('Poats.layout')
@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    {{-- مكانة يكون قبل الاستمارة حتى لايتمكن من ارسال بيانات الاستمارة الابعد  مصادقة  --}}
    {{csrf_field()}}  {{-- // حماية موقع من طلبات المزورة --}}
    <input type="hidden" name="user_id" value="{{Auth::id()}}">  {{-- تظهر لك رقم مستخدم الذي دخل عبر تسجيل الدخول --}}

     <div class="form-group">
        <label for="title-id" >Title Post<span style="color: red ;font-size: 17px; "> *</span></label>
                                                      {{--  edit  متغير بوست ياتي من كنترول حق تعديل  --}}
                                                   {{--    isset داله تختبر انه في متغير بهذا الاسم او لا --}}
        <input type="text" class="form-control" id="title-id"  name="title"  value="{{old("title" ,isset($post)?$post->title : null)}}">   {{-- name="title" اسم جدول الذي بانضيف فية في قاعدة البيانات  --}}
      </div> 
        {{--   {{old("title")}} هذي دالة تعمل على حفظ النصوص موجودة في الحقول في حالة
          name="title"  كان خطأ او وجود حقل فارغ وعند إعادة الصفحة ماتروح البيانات  نمرر لها اسم الحقل  --}}
      <div class="form-group">
        <label for="body-id">Text Post<span style="color: red ; font-size: 17px; "> *</span></label>
        <textarea class="form-control" id="body-id"  name="body"  rows="10">{{old("body" ,isset($post)?$post->body : null)}}</textarea>
      </div>
      <div class="form-group">
        <label for="excerpt-id">Excerpt Post <span style="color: red ; font-size: 17px; "> *</span></label>
        <textarea class="form-control" id="excerpt-id"  name="excerpt"  rows="2">{{old("excerpt" ,isset($post)?$post->excerpt : null)}}</textarea>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" >
        <label class="form-check-label" name="is_published">Published</label>
      </div>
      <button type="submit" class="btn btn-primary mb-5">Send Post</button>
</form>

@endsection