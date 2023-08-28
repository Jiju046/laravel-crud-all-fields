   @props(['student' => null, 'cities' => [], 'cityvalue' => null]) <!-- default values -->

    <div>
        @csrf

        {{-- name --}}
        <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', $student->name, ['class' => 'form-control','placeholder' => 'Name']) !!}

            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- email --}}
        <div class="mb-3">
            {!! Form::label('email', 'Email address', ['class' => 'form-label']) !!}
            {!! Form::text('email', $student->email, ['class' => 'form-control', 'aria-describedby' => 'emailHelp','placeholder' => 'Email']) !!}
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

            @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- skills --}}
        <div class="mb-3">
            <div class="mb-3">
                {!! Form::label('skills', 'Skills', ['class' => 'form-label']) !!}
                <div class="form-check">
                    {!! Form::checkbox('skills[]', 'c++', in_array('c++', $student->skills ?? []), ['class' => 'form-check-input', 'id' => 'c++']) !!}
                    {!! Form::label('c++', 'C++', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills[]', 'java', in_array('java', $student->skills ?? []), ['class' => 'form-check-input', 'id' => 'java']) !!}
                    {!! Form::label('java', 'Java', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills[]', 'python', in_array('python', $student->skills ?? []), ['class' => 'form-check-input', 'id' => 'python']) !!}
                    {!! Form::label('python', 'Python', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills[]', 'javascript', in_array('javascript', $student->skills ?? []), ['class' => 'form-check-input', 'id' => 'javascript']) !!}
                    {!! Form::label('javascript', 'JavaScript', ['class' => 'form-check-label']) !!}
                </div>
            </div>          

            @error('skills')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- gender --}}
        <div class="mb-3">
            {!! Form::label('gender', 'Gender', ['class' => 'form-label']) !!}
            <div class="form-check">
                {!! Form::radio('gender', 'male', $student->gender === 'male', ['class' => 'form-check-input', 'id' => 'male']) !!}
                {!! Form::label('male', 'Male', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check">
                {!! Form::radio('gender', 'female', $student->gender === 'female', ['class' => 'form-check-input', 'id' => 'female']) !!}
                {!! Form::label('female', 'Female', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check">
                {!! Form::radio('gender', 'others', $student->gender === 'others', ['class' => 'form-check-input', 'id' => 'others']) !!}
                {!! Form::label('others', 'Others', ['class' => 'form-check-label']) !!}
            </div>
            
            @error('gender')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- appointment --}}

        <div class="mb-3">
            {!! Form::label('appointment','Appointment',['class' => 'form-label']) !!}
            {!! Form::date('appointment', $student->appointment, ['class' => 'form-control', 'min' => date('Y-m-d')]) !!}

            @error('appointment')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- city --}}
        <div class="mb-3">
            {!! Form::label('city','City', ['class' => 'form-label']) !!}
            {!! Form::select('city', $cities, $cityvalue, ['class' => 'form-control', 'placeholder' => 'Choose']) !!}

            @error('city')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- address --}}
        <div class="mb-3">
            {!! Form::label('address','Address', ['class' => 'form-label']) !!}
            {!! Form::textarea('address', $student->address, ['class' => 'form-control', 'placeholder' => 'Address', 'rows' => '3']) !!}

            @error('address')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        {!! Form::submit($student ? 'Update' : 'Submit', ['class' => 'btn', 'style' => 'background-color:#576CBC; color:white' ]) !!}
    </div>