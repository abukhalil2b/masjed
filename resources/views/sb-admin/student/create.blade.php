@extends('layouts.sb_admin')
@section('content')

<h4>اضافة طالب  جديد  للمركز</h4>
	<form method="post" action="{{route('student.store')}}">
		@csrf
        <table class="table">
			<tr>
        		<td>الإسم</td>
        		<td>
                  <input name="name" class="form-control" placeholder="الإسم">
                </td>
        	</tr>
        	<tr>
        		<td>رقم الهاتف</td>
        		<td>
                  <input name="phone" class="form-control" placeholder="رقم الهاتف">
                </td>
        	</tr>
        	<tr>
        		<td>الجنس</td>
        		<td>
                  <select name="gender" class="form-control">
                  	<option value="male">{{__('male')}}</option>
                  	<option value="female">{{__('female')}}</option>
                  </select>
                </td>
        	</tr>
        	<tr>
        		<td>سنة الميلاد</td>
        		<td>
                  <select name="yearbirth" class="form-control">
                  	<option value=""></option>
                  	<option value="2018">2018</option>
                  	<option value="2017">2017</option>
                  	<option value="2016">2016</option>
                  	<option value="2015">2015</option>
                  	<option value="2014">2014</option>
                  	<option value="2013">2013</option>
                  	<option value="2012">2012</option>
                  	<option value="2011">2011</option>
                  	<option value="2010">2010</option>
                  	<option value="2009">2009</option>
                  	<option value="2008">2008</option>
                  	<option value="2007">2007</option>
                  	<option value="2006">2006</option>
                  	<option value="2005">2005</option>
                  </select>
                </td>
        	</tr>
            <tr>
                <td colspan="2">
                	كلمة المرور ستكون نفس رقم الهاتف
                    <button class="btn btn-info btn-block">حفظ</button>
                </td>
            </tr>
        </table>
    </form>

@endsection
