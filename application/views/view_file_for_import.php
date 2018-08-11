
<script type="text/javascript">
function changeValW(t)
	{
		var w_w = $(t).val();
		var w_h = $(t).next('input').val();
		//alert(h);
		$(t).next('input').next('input').val(parseFloat(w_w) * parseFloat(w_h));
		//alert($(t).val());
	}
	function changeValh(t)
	{
		var h_h = $(t).val();
		var h_w = $(t).prev('input').val();
		//alert(h);
		$(t).next('input').val(parseFloat(h_w) * parseFloat(h_h));
		//alert($(t).val());
	}
	
  $(document).ready(function() {
	
	/*$('.add_product_size_w').each(function(){
		//alert($(this).val());
		$(this).keyup(function(){
			alert($(this).val());
		})
	})*/
	
	  
	var is_calculated = $('option:selected', "#category_id").attr('attr_iscalculated');
	
		if(is_calculated == '1')
		{
			$('#non_composite').hide();
			$('#composite').show();
			$('.non_composite_adds').hide();
			$('.composite_adds').hide();
		}
		else
		{
			$('#non_composite').show();
			$('#composite').hide();
			$('.non_composite_adds').hide();
			$('.composite_adds').hide();
		}

  /* image preview  start */  
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#userfile").change(function(){
    readURL(this);
  });
  /* image preview  end */  

    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
	var is_calculated = $('option:selected', "#category_id").attr('attr_iscalculated');
		
        e.preventDefault();
        if(x < max_fields && is_calculated == 0){ //max input box allowed
            x++; //text box increment
			
			$('.composite_adds').remove();
            $(wrapper).append('<div class="col-md-10 non_composite_adds" style="padding-left: 0px;margin-bottom: 5px;"><input type="text" class="gui-input" name="add_product_size[]" placeholder="Product Size"/><a href="#" class="remove_field btn btn-danger" style="position: absolute;margin-left: 10px;">X</a></div>'); //add input box
        }
		
        if(x < max_fields && is_calculated == 1){ //max input box allowed
            x++; //text box increment
			$('.non_composite_adds').remove();
            $(wrapper).append("<div class='col-md-10 composite_adds' style='padding-left: 0px; margin-bottom: 5px;'><label class='field prepend-icon'> <b class='composite_size' style='width: 50px !important; padding-top: 10px;''>Feet :</b><input type='text' class='gui-input composite_size add_product_size_w' name='add_product_size_w[]' id='product_size_w'  placeholder='Width' onkeyup='changeValW(this);'><input type='text' class='gui-input composite_size add_product_size_h' name='add_product_size_h[]' id='product_size_h'  placeholder='Height' onkeyup='changeValh(this);'><input type='text' class='gui-input composite_size add_product_size_c' name='add_product_size_c[]' id='product_size'  placeholder='Total'><label for='product_size[]' class='field'></label></label> <label class='field prepend-icon'> <b class='composite_size' style='width: 50px !important; padding-top: 10px;''>Meter :</b><input type='text' class='gui-input composite_size add_product_size_w' name='add_product_size_wm[]' id='product_size_w'  placeholder='Width' onkeyup='changeValW(this);'><input type='text' class='gui-input composite_size add_product_size_h' name='add_product_size_hm[]' id='product_size_h'  placeholder='Height' onkeyup='changeValh(this);'><input type='text' class='gui-input composite_size add_product_size_c' name='add_product_size_cm[]' id='product_size'  placeholder='Total'><label for='product_size[]' class='field'></label></label> </div> <div class='col-md-2'><a href='#' class='remove_field btn btn-danger' style='position: absolute;'>X</a></div>"); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
         $(this).parent('div').remove(); x--;
    })



   $("#category_id").on('change', function() {
        // $( ".member" ).removeClass( "hidden" );
        category_name();
		var is_calculated = $('option:selected', this).attr('attr_iscalculated');
		if(is_calculated == '1')
		{
			$('#hdn_composite').val(is_calculated);
			$('#non_composite').hide();
			$('#composite').show();
			$('.non_composite_adds').hide();
			$('.composite_adds').hide();
		}
		else
		{
			$('#hdn_composite').val(is_calculated);
			$('#non_composite').show();
			$('#composite').hide();
			$('.non_composite_adds').hide();
			$('.composite_adds').hide();
		}
      });
        
        function category_name() {
           var category_id = $("#category_id").val();
           // alert(category_id);
           $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>master/get_category',
                data: { 'category_id': category_id },
                cache: false,
                success: function(result) {
                  result= JSON.parse(result);
                 $("#sub_category_id").empty();
                   $("#sub_category_id").append($("<option></option>").val(0).html('Please Select'));
                      $.each(result, function (key, value) {

                        $("#sub_category_id").append($("<option></option>").val(key).html(value));

                        });
                }
            });
         }
    

    /* @custom validation method (smartCaptcha) 
    ------------------------------------------------------------------ */

    $.validator.methods.smartCaptcha = function(value, element, param) {
      return value == param;
    };

    $("#admin-form").validate({

      /* @validation states + elements 
      ------------------------------------------- */

      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",

      /* @validation rules 
      ------------------------------------------ */

      rules: {
      
        product_code: {
          required: true
        },
        product_cost: {
          required: true
        },
        product_name: {
          required: true
        },
        dealer_price: {
          required: true
        },
        hsn_code: {
          required: true
        },
        alert_quantity: {
          required: true
        },
        category_id: {
          required: true
        },
        igst: {
          required: true,
          number: true
        },
        cgst: {
          required: true,
          number: true
        },
        brand_id: {
          required: true
        },
        sgst: {
          required: true,
          number: true
        },
        unit_id: {
          required: true
        },
        'product_size[]': {
          required: true
        },
        product_details: {
          required: true
        }
       
      },

      /* @validation error messages 
      ---------------------------------------------- */

      messages: {
      
        product_code: {
          required: 'Enter Product Code'
        },
        product_cost: {
          required: 'Enter Product Cost'
        },
        product_name: {
          required: 'Enter Product Name'
        },
        dealer_price: {
          required: 'Enter Dealer Price'
        },
        hsn_code: {
          required: 'Enter HSN Code'
        },
        alert_quantity: {
          required: 'Enter Alert Quantity'
        },
        category_id: {
          required: 'Select Category'
        },
        igst: {
          required: 'Enter IGST',
          number: 'Enter Valid Number'
        },
        cgst: {
          required: 'Enter CGST',
          number: 'Enter Valid Number'
        },
        brand_id: {
          required: 'Select Brand'
        },
        sgst: {
          required: 'Enter SGST',
          number: 'Enter Valid Number'
        },
        unit_id: {
          required: 'Select Unit'
        },
        'product_size[]': {
          required: 'Enter Product Size'
        },
        product_details: {
          required: 'Enter Product Details'
        }

      },

      /* @validation highlighting + error placement  
      ---------------------------------------------------- */

      highlight: function(element, errorClass, validClass) {
        $(element).closest('.field').addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).closest('.field').removeClass(errorClass).addClass(validClass);
      },
      errorPlacement: function(error, element) {
        if (element.is(":radio") || element.is(":checkbox")) {
          element.closest('.option-group').after(error);
        } else {
          error.insertAfter(element.parent());
        }
      }

    });



  });
  

  </script>
