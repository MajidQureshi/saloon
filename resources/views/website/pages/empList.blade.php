@foreach ($emps as $key => $item)
    <div class="user-card checkbox p-0">
        <input type="hidden" name="emp-{{$item->emp_id}}" class="emp" value="{{$item->name}}">
        <label class="checkbox-wrapper">
            <input type="radio" name="emp_id" class="checkbox-input wizard-required" value="{{$item->emp_id}}" {{ $key == 0? 'checked':'' }}/>
            <div class="user-bio">
                <div class="d-flex align-items-center">
                    <div class="user-thumb user-thumb-md mr-3">
                        <img src="{{$item->imagePath .'/'. $item->image}} " alt="author-image">
                    </div>
                    <div class="user-inner-bio">
                        <h4 class="author__title"> {{$item->name}} </h4>
                    </div>
                </div>
            </div>
        </label>
    </div>
@endforeach