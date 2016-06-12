@extends('admin.layout')

@section('header_links')
  <link rel="stylesheet" href="{{ asset('nexuspress/chosen/chosen.min.css') }}" type="text/css" />
@endsection

@section('content')

    
    <h2 class="adminTitle"> Edit Link </h2> 

    <div class="col_half">
        <div id="contentMainWrapper" style="padding:20px;">

      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form method="POST" action="{{ url('admin/new_link') }}/{{$link->id}}" enctype="multipart/form-data">
          {!! csrf_field() !!}

           <div class="form-group">
              <label for="exampleInputEmail1"> Image URL </label>
              <a href="#" id="load_media_files" class="featImageButton"> <i class="icon-line-marquee-plus"></i> </a> 
              <div id="img_here">
                <img src="{{url('uploads')}}/{{$link->image}}" alt="">
              </div>  
              <input id="featured_image" type='hidden' name='image' value='{{$link->image}}'>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"> Ad Link URL </label>
              <input type="text" class="form-control" name="url" value="{{$link->url}}" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"> Ad Title </label>
              <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="" value="{{$link->description}}">
            </div>          
            <div class="form-group">
              <label for="exampleInputPassword1"> Ad URL Caption</label>
              <input type="text" name="website_url" value="{{$link->website_url}}"  class="form-control newPost" id="exampleInputPassword1" placeholder="">
            </div>    
               {!! Form::select('countries[]', 
                [
                  'AF' => 'Afghanistan',
                  'AX' => 'Aland Islands',
                  'AL' => 'Albania',
                  'DZ' => 'Algeria',
                  'AS' => 'American Samoa',
                  'AD' => 'Andorra',
                  'AO' => 'Angola',
                  'AI' => 'Anguilla',
                  'AQ' => 'Antarctica',
                  'AG' => 'Antigua And Barbuda',
                  'AR' => 'Argentina',
                  'AM' => 'Armenia',
                  'AW' => 'Aruba',
                  'AU' => 'Australia',
                  'AT' => 'Austria',
                  'AZ' => 'Azerbaijan',
                  'BS' => 'Bahamas',
                  'BH' => 'Bahrain',
                  'BD' => 'Bangladesh',
                  'BB' => 'Barbados',
                  'BY' => 'Belarus',
                  'BE' => 'Belgium',
                  'BZ' => 'Belize',
                  'BJ' => 'Benin',
                  'BM' => 'Bermuda',
                  'BT' => 'Bhutan',
                  'BO' => 'Bolivia',
                  'BA' => 'Bosnia And Herzegovina',
                  'BW' => 'Botswana',
                  'BV' => 'Bouvet Island',
                  'BR' => 'Brazil',
                  'IO' => 'British Indian Ocean Territory',
                  'BN' => 'Brunei Darussalam',
                  'BG' => 'Bulgaria',
                  'BF' => 'Burkina Faso',
                  'BI' => 'Burundi',
                  'KH' => 'Cambodia',
                  'CM' => 'Cameroon',
                  'CA' => 'Canada',
                  'CV' => 'Cape Verde',
                  'KY' => 'Cayman Islands',
                  'CF' => 'Central African Republic',
                  'TD' => 'Chad',
                  'CL' => 'Chile',
                  'CN' => 'China',
                  'CX' => 'Christmas Island',
                  'CC' => 'Cocos (Keeling) Islands',
                  'CO' => 'Colombia',
                  'KM' => 'Comoros',
                  'CG' => 'Congo',
                  'CD' => 'Congo, Democratic Republic',
                  'CK' => 'Cook Islands',
                  'CR' => 'Costa Rica',
                  'CI' => 'Cote D\'Ivoire',
                  'HR' => 'Croatia',
                  'CU' => 'Cuba',
                  'CY' => 'Cyprus',
                  'CZ' => 'Czech Republic',
                  'DK' => 'Denmark',
                  'DJ' => 'Djibouti',
                  'DM' => 'Dominica',
                  'DO' => 'Dominican Republic',
                  'EC' => 'Ecuador',
                  'EG' => 'Egypt',
                  'SV' => 'El Salvador',
                  'GQ' => 'Equatorial Guinea',
                  'ER' => 'Eritrea',
                  'EE' => 'Estonia',
                  'ET' => 'Ethiopia',
                  'FK' => 'Falkland Islands (Malvinas)',
                  'FO' => 'Faroe Islands',
                  'FJ' => 'Fiji',
                  'FI' => 'Finland',
                  'FR' => 'France',
                  'GF' => 'French Guiana',
                  'PF' => 'French Polynesia',
                  'TF' => 'French Southern Territories',
                  'GA' => 'Gabon',
                  'GM' => 'Gambia',
                  'GE' => 'Georgia',
                  'DE' => 'Germany',
                  'GH' => 'Ghana',
                  'GI' => 'Gibraltar',
                  'GR' => 'Greece',
                  'GL' => 'Greenland',
                  'GD' => 'Grenada',
                  'GP' => 'Guadeloupe',
                  'GU' => 'Guam',
                  'GT' => 'Guatemala',
                  'GG' => 'Guernsey',
                  'GN' => 'Guinea',
                  'GW' => 'Guinea-Bissau',
                  'GY' => 'Guyana',
                  'HT' => 'Haiti',
                  'HM' => 'Heard Island & Mcdonald Islands',
                  'VA' => 'Holy See (Vatican City State)',
                  'HN' => 'Honduras',
                  'HK' => 'Hong Kong',
                  'HU' => 'Hungary',
                  'IS' => 'Iceland',
                  'IN' => 'India',
                  'ID' => 'Indonesia',
                  'IR' => 'Iran, Islamic Republic Of',
                  'IQ' => 'Iraq',
                  'IE' => 'Ireland',
                  'IM' => 'Isle Of Man',
                  'IL' => 'Israel',
                  'IT' => 'Italy',
                  'JM' => 'Jamaica',
                  'JP' => 'Japan',
                  'JE' => 'Jersey',
                  'JO' => 'Jordan',
                  'KZ' => 'Kazakhstan',
                  'KE' => 'Kenya',
                  'KI' => 'Kiribati',
                  'KR' => 'Korea',
                  'KW' => 'Kuwait',
                  'KG' => 'Kyrgyzstan',
                  'LA' => 'Lao People\'s Democratic Republic',
                  'LV' => 'Latvia',
                  'LB' => 'Lebanon',
                  'LS' => 'Lesotho',
                  'LR' => 'Liberia',
                  'LY' => 'Libyan Arab Jamahiriya',
                  'LI' => 'Liechtenstein',
                  'LT' => 'Lithuania',
                  'LU' => 'Luxembourg',
                  'MO' => 'Macao',
                  'MK' => 'Macedonia',
                  'MG' => 'Madagascar',
                  'MW' => 'Malawi',
                  'MY' => 'Malaysia',
                  'MV' => 'Maldives',
                  'ML' => 'Mali',
                  'MT' => 'Malta',
                  'MH' => 'Marshall Islands',
                  'MQ' => 'Martinique',
                  'MR' => 'Mauritania',
                  'MU' => 'Mauritius',
                  'YT' => 'Mayotte',
                  'MX' => 'Mexico',
                  'FM' => 'Micronesia, Federated States Of',
                  'MD' => 'Moldova',
                  'MC' => 'Monaco',
                  'MN' => 'Mongolia',
                  'ME' => 'Montenegro',
                  'MS' => 'Montserrat',
                  'MA' => 'Morocco',
                  'MZ' => 'Mozambique',
                  'MM' => 'Myanmar',
                  'NA' => 'Namibia',
                  'NR' => 'Nauru',
                  'NP' => 'Nepal',
                  'NL' => 'Netherlands',
                  'AN' => 'Netherlands Antilles',
                  'NC' => 'New Caledonia',
                  'NZ' => 'New Zealand',
                  'NI' => 'Nicaragua',
                  'NE' => 'Niger',
                  'NG' => 'Nigeria',
                  'NU' => 'Niue',
                  'NF' => 'Norfolk Island',
                  'MP' => 'Northern Mariana Islands',
                  'NO' => 'Norway',
                  'OM' => 'Oman',
                  'PK' => 'Pakistan',
                  'PW' => 'Palau',
                  'PS' => 'Palestinian Territory, Occupied',
                  'PA' => 'Panama',
                  'PG' => 'Papua New Guinea',
                  'PY' => 'Paraguay',
                  'PE' => 'Peru',
                  'PH' => 'Philippines',
                  'PN' => 'Pitcairn',
                  'PL' => 'Poland',
                  'PT' => 'Portugal',
                  'PR' => 'Puerto Rico',
                  'QA' => 'Qatar',
                  'RE' => 'Reunion',
                  'RO' => 'Romania',
                  'RU' => 'Russian Federation',
                  'RW' => 'Rwanda',
                  'BL' => 'Saint Barthelemy',
                  'SH' => 'Saint Helena',
                  'KN' => 'Saint Kitts And Nevis',
                  'LC' => 'Saint Lucia',
                  'MF' => 'Saint Martin',
                  'PM' => 'Saint Pierre And Miquelon',
                  'VC' => 'Saint Vincent And Grenadines',
                  'WS' => 'Samoa',
                  'SM' => 'San Marino',
                  'ST' => 'Sao Tome And Principe',
                  'SA' => 'Saudi Arabia',
                  'SN' => 'Senegal',
                  'RS' => 'Serbia',
                  'SC' => 'Seychelles',
                  'SL' => 'Sierra Leone',
                  'SG' => 'Singapore',
                  'SK' => 'Slovakia',
                  'SI' => 'Slovenia',
                  'SB' => 'Solomon Islands',
                  'SO' => 'Somalia',
                  'ZA' => 'South Africa',
                  'GS' => 'South Georgia And Sandwich Isl.',
                  'ES' => 'Spain',
                  'LK' => 'Sri Lanka',
                  'SD' => 'Sudan',
                  'SR' => 'Suriname',
                  'SJ' => 'Svalbard And Jan Mayen',
                  'SZ' => 'Swaziland',
                  'SE' => 'Sweden',
                  'CH' => 'Switzerland',
                  'SY' => 'Syrian Arab Republic',
                  'TW' => 'Taiwan',
                  'TJ' => 'Tajikistan',
                  'TZ' => 'Tanzania',
                  'TH' => 'Thailand',
                  'TL' => 'Timor-Leste',
                  'TG' => 'Togo',
                  'TK' => 'Tokelau',
                  'TO' => 'Tonga',
                  'TT' => 'Trinidad And Tobago',
                  'TN' => 'Tunisia',
                  'TR' => 'Turkey',
                  'TM' => 'Turkmenistan',
                  'TC' => 'Turks And Caicos Islands',
                  'TV' => 'Tuvalu',
                  'UG' => 'Uganda',
                  'UA' => 'Ukraine',
                  'AE' => 'United Arab Emirates',
                  'GB' => 'United Kingdom',
                  'US' => 'United States',
                  'UM' => 'United States Outlying Islands',
                  'UY' => 'Uruguay',
                  'UZ' => 'Uzbekistan',
                  'VU' => 'Vanuatu',
                  'VE' => 'Venezuela',
                  'VN' => 'Viet Nam',
                  'VG' => 'Virgin Islands, British',
                  'VI' => 'Virgin Islands, U.S.',
                  'WF' => 'Wallis And Futuna',
                  'EH' => 'Western Sahara',
                  'YE' => 'Yemen',
                  'ZM' => 'Zambia',
                  'ZW' => 'Zimbabwe',
                ], $country_codes, ['data-placeholder' => 'Choose a Country...', 'multiple' => 'multiple','class' => 'chosen-select','multiple','style' => 'width:350px;']) !!}

            <label class="checkbox" for="published" class="pull-right" >
                  <?php $check_visible = false; ?>
                  @if($link->visible == 1)
                  <?php $check_visible = true; ?>
                  @endif
                  {!! Form::checkbox('visible', 1,$check_visible) !!} Make it Visible
              </label>
            
          <input type="submit" value="Submit" class="button button-3d">
      </form>

    </div>

    
<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Media File</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div id="fileuploader">Upload</div>
                    <div id="image_list">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='save_changes_modal'> Use Image </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="template_for_media_file" type="nexus/template">
<div class="outer">
<a href="#" class="remove_image" get-id="--id--">X</a>
<div class="inner">
<img src="{{ url('uploads') }}/--image_url--" get-this="--image_url--" />
</div>                          
</div>
</script>

<script>
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
      template_for_media_file = $.trim($("#template_for_media_file").html());

  $("#fileuploader").uploadFile({
    url:"{{url('admin/ajax_upload_image')}}",
      fileName:"myfile",
      formData: { _token: CSRF_TOKEN },
      onSuccess:function(files,data,xhr,pd)
      {
        var parsed = JSON.parse(data);

          var add_parent = 
          template_for_media_file.replace(/--image_url--/ig, parsed.image_url)
          .replace(/--id--/ig, parsed.id);

          $('#image_list').prepend(add_parent);

      }
    });


  $('#load_media_files').on('click',function(){
    $('#image_list').html('');
      $.ajax({ 
        type: 'get',
        url: "{{url('admin/ajax_get_media_file')}}",
        success: function(response)
        {
          var parsed = JSON.parse(response);

            $.each( parsed, function( index, obj){

              var add_parent = 
                template_for_media_file.replace(/--image_url--/ig, obj.image_url)
                .replace(/--id--/ig, obj.id);

              $('#image_list').append(add_parent);

          });

        }
      });

    $('#myModal').modal('show');
  });

  $("#image_list").on('click','.remove_image',function() {

    var current_image = $(this);
    var image_id = current_image.attr('get-id');

    if(confirm("Are you sure to delete this image?") == true)
    {

      $.ajax({ 
        type: 'post',
        url: "{{url('admin/ajax_delete_image')}}",
        data: {_token: CSRF_TOKEN,'image_id' : image_id},
        success: function(response) 
        {
           current_image.parent().remove();
        }
      });
    }

    return false;
  });

  var url = '';
    $("#image_list").on("click", "img", function (event) {
        url = $(this).attr('get-this');
        $('.outer').removeClass('selected');
        $(this).parents('.outer').addClass('selected');
    });
  // Hide modal if "Okay" is pressed
    $('#myModal #save_changes_modal').click(function() {
        $('#myModal').modal('hide');
        $('#img_here').html("<img src='{{ url('uploads') }}/"+url+"'>");
        $('#featured_image').attr('value',url);
        console.log(url);
    });
});
</script>
@endsection

@section('footer_scripts')
  <script type="text/javascript" src="{{ asset('nexuspress/chosen/chosen.jquery.min.js') }}"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
@endsection