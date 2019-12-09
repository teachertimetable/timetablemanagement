@extends('.layouts.timetable_layout')

@section('content')
    <div class="container py-3">
        <div class="tablemodulebg">
            <h1>ตารางแนะนำแบบโมดูล</h1>
            <br>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Find Out More!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam ut praesentium aut.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Find Out More!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Find Out More!</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="timetable"></div>
        </div><br>



    </div>
@endsection


