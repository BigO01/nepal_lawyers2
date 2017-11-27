 var _URL = window.URL || window.webkitURL;

    $("#aimginput").change(function(e) {
        var file, img;
        var wd=1395;
        var ht=100;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if (wd===this.width &&  ht===this.height) {
					return 1;
                } else {
                     alert("Please select an image with size 1395px*100px" );
					  //$('#aimginput').val('');
					//return 0;
                }

            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
            };
            img.src = _URL.createObjectURL(file);


        }

    });
	$("#limginput").change(function(e) {
        var file, img;
        var wd=275;
        var ht=45;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if (wd===this.width &&  ht===this.height) {
					return 1;
                } else {
                     alert("Please select an image with size 275px*45px" );
					  //$('#aimginput').val('');
					//return 0;
                }

            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
            };
            img.src = _URL.createObjectURL(file);


        }

    });
	$("#flimginput").change(function(e) {
        var file, img;
        var wd=90;
        var ht=90;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if (wd===this.width &&  ht===this.height) {
					return 1;
                } else {
                     alert("Please select an image with size 90px*90px" );
					  //$('#aimginput').val('');
					//return 0;
                }

            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
            };
            img.src = _URL.createObjectURL(file);


        }

    });
	$("#fimginput").change(function(e) {
        var file, img;
        var wd=16;
        var ht=16;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if (wd===this.width &&  ht===this.height) {
					return 1;
                } else {
                     alert("Please select an image with size 16px*16px" );
					  //$('#aimginput').val('');
					//return 0;
                }

            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
            };
            img.src = _URL.createObjectURL(file);


        }

    });
	$("#tmimginput").change(function(e) {
        var file, img;
        var wd=1920;
        var ht=1280;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                if (wd===this.width &&  ht===this.height) {
					return 1;
                } else {
                     alert("Please select an image with size 1920px*1280px" );
					  //$('#aimginput').val('');
					//return 0;
                }

            };
            img.onerror = function() {
                alert( "not a valid file: " + file.type);
            };
            img.src = _URL.createObjectURL(file);


        }

    });

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profileimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
function logoimg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#limg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
function flogoimg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#flimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
function adimg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#aimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
function fcimg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
function bimgfn(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#bimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
function tmimgfn(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#tmimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }