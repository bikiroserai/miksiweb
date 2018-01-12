@extends('Front.Layouts.master')
@section('content')
    <body>
    <style>
        .canvas{
            position: absolute;
            top:0px;
            left:0px;
        }
        .img-thumbnail{
            margin-bottom: 5px;
        }
        .noPadding{
            padding: 5px;
        }
        .container-fluid{
            margin-left: 200px;
            margin-right: 200px;
        }

    </style>
    <script src="js/jquery-3.1.1.js"></script>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-2" class="design_studio"   >
                <div class="panel-group" id="left_accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="add_text">
                            <h4 class="panel-title">
                            <span role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#text_controls" aria-expanded="false" aria-controls="text">
                                Add Your Text
                            </span>
                            </h4>
                        </div>
                        <div id="text_controls" class="panel-collapse collapse" role="tabpanel" aria-labelledby="add_text">
                            <div class="panel-body">
                                <button id="btn_addtext" class="btn btn-primary">Add Text</button>
                                <hr>
                                <div id="add_textarea">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="add_clipart">
                            <h4 class="panel-title">
                            <span class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#clipart_controls" aria-expanded="false" aria-controls="clipart_controls">
                                Add Clipart
                            </span>
                            </h4>
                        </div>
                        <div id="clipart_controls" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body" style="height: 300px; overflow-y: auto ">
                                <div class="row">
                                    <div class="col-md-4 noPadding">
                                    <!--  {{URL::to('Images/mainlogo1.png')}} -->
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/001-acoustic-guitar.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/002-brainstorm.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/003-coins.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">

                                    </div>
                                    <div class="col-md-4 noPadding">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/018-flower.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/009-twitter.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/009-twitter.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/022-bird.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/006-whatsapp.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/007-facebook-1.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/008-linkedin.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">

                                    </div>
                                    <div class="col-md-4 noPadding">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/014-like.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/019-rainbow.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/016-man.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/015-presentation.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/011-facebook.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/012-computer.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/013-like-1.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="add_image">
                            <h4 class="panel-title">
                            <span class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#image_controls" aria-expanded="false" aria-controls="image_controls">
                                Add Image
                            </span>
                            </h4>
                        </div>
                        <div id="image_controls" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <input type="file" name="uploaded_image" value="Upload">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="add_clipart">
                            <h4 class="panel-title">
                            <span class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#clipart_controls" aria-expanded="false" aria-controls="clipart_controls">
                                Browse Products
                            </span>
                            </h4>
                        </div>
                        <div id="clipart_controls" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body" style="height: 300px; overflow-y: auto ">
                                <div class="row">
                                    <div class="col-md-4 noPadding">
                                    <!--  {{URL::to('Images/mainlogo1.png')}} -->
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/001-acoustic-guitar.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/002-brainstorm.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/003-coins.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">

                                    </div>
                                    <div class="col-md-4 noPadding">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/018-flower.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/009-twitter.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/009-twitter.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">


                                    </div>
                                    <div class="col-md-4 noPadding">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/014-like.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/019-rainbow.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">
                                        <img onclick="clipArtClicked(this)" role="button" src="{{URl::to('design_presets/cliparts/016-man.svg')}}" alt="" class="img-thumbnail img-responsive img-rounded center-block">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="background-color: snow; height: 600px; margin-top: 20px;">
                <div style="position:relative;">
                    <img src="{{URL::to('design_presets/sample.png')}}" alt="tee">
                    <div class="canvas">
                        <canvas id="front_canvas" ></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-2" class="design_studio"   >
                <div class="panel-group" id="left_accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="add_text">
                            <h4 class="panel-title">
                            <span role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" aria-controls="text">
                               Save Design
                            </span>
                            </h4>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="add_clipart">
                            <h4 class="panel-title">
                            <span class="collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" aria-controls="clipart_controls">
                              Order Now
                            </span>
                            </h4>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="js/fabric.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        var front_canvas = new fabric.Canvas('front_canvas',{
            height: 600,
            width: 600
        });
        front_canvas.clipTo=function (ctx) {
            ctx.rect(180,90,240,360);
        };
        //create textarea on click of add text button and also make an text object for canvas
        var counter = 0;
        $('#btn_addtext').click(function () {
            counter++;
            $('#add_textarea').append('<textarea id="textArea'+counter+'" cols="30" rows="3" class="form-control"></textarea>'+
                '<span id="counter'+counter+'" style="visibility: hidden;">'+counter+'</span>');
            var text = new fabric.Text('', {
                left: 300,
                top: 250,
                originX : 'center',
                originY : 'center'
            });
            front_canvas.add(text);
            //check text in textarea and draw it on the canvas
            //the work of trickycounter is to attach each textarea with its respective text object drawn in canvas
            var trickyCounter = $('#counter'+counter).html();
            $('#textArea'+trickyCounter).keyup(function () {
                var myText = $('#textArea'+trickyCounter).val();
                text.setText(myText);
                front_canvas.renderAll();
            });
        });

        function clipArtClicked(imgElement) {
            var imgInstance = new fabric.Image(imgElement, {
                left: 300,
                top: 300,
                scaleX: 3,
                scaleY: 3,
                originX : 'center',
                originY : 'center'
            });
            front_canvas.add(imgInstance);
            front_canvas.renderAll();
        }
        document.addEventListener("keydown", KeyCheck);  //or however you are calling your method
        function KeyCheck(event)
        {
            var KeyID = event.keyCode;
            //if (KeyID==46) front_canvas.getActiveObject().remove();

            switch(KeyID)
            {
                case 8://for backslash
                    //here check whether activeobject has gettext method if not then typeerror will be thrown
                    //which will be caught and then the activeobject is proved image object so removed
                    try {
                        front_canvas.getActiveObject().getText();
                    }catch(e){
                        try {front_canvas.getActiveObject().remove();} catch(e){}
                    }
                    break;
                case 46:
                    try {
                        front_canvas.getActiveObject().getText();
                    }catch(e){
                        try {front_canvas.getActiveObject().remove();} catch(e){}
                    }
                    break;
                default:
                    break;
            }
        }

    </script>
@endsection