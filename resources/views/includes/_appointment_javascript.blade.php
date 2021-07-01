{!! Html::script('pickadate/picker.js') !!}
{!! Html::script('pickadate/picker.date.js') !!}
{!! Html::script('pickadate/picker.time.js') !!}
{!! Html::script('pickadate/legacy.js') !!}
<script>

  var input_date = $('.datepicker').pickadate({
    min: true,
    formatSubmit: 'yyyy-m-d'
  });
  var date_picker = input_date.pickadate('picker');

  var input_time = $('.timepicker').pickatime({
    min: 4,
    formatSubmit: 'HH:i'
  });
  var time_picker = input_time.pickatime('picker');

  @if (!isset($appointment))
    var specialty = $('#specialty');
    var doctor = $('#doctor');

    specialty.change(function () {
      $.ajax({
          url: "{{route('ajax.user_specialty')}}",
          method: 'GET',
          data: {
              specialty: specialty.val(),
          },
          success: function (data) {
            doctor.empty();
            doctor.append('<option disabled selected>-- Selecciona un medico --</option>');
            $.each(data, function (index, element) {
                doctor.append('<option value="' + element.id + '">' + element.name + '</option>')
            });

          }
      });
    });
    doctor.change(function () {
      $.ajax({
          url: "{{ route('doctor.disable_dates') }}",
          data: {
              doctor: doctor.val(),
          },
          success: function (data) {
              time_picker.set('clear');
              disable_dates = data.disable_dates.split('-');
              dates_count = disable_dates.length;
              disable_dates_arr = [];
              $.each(disable_dates, function (i, x) {
                  date_arr = x.split(',');
                  elem_arr = [];
                  $.each(date_arr, function (j, y) {
                      elem = parseInt(y);
                      elem_arr.push(elem);
                  });
                  disable_dates_arr.push(elem_arr);
              });
              days_off = data.days_off.split('-');
              $.each(days_off, function (k, z) {
                  day = parseInt(z);
                  disable_dates_arr.push(day);
              });
              date_picker.set({
                  min: true,
                  disable: disable_dates_arr
              });
          }
      });
    });
    date_picker.on('set', function () {
      time_picker.set('clear');
      $.ajax({
          url: "{{ route('doctor.disable_times') }}",
          data: {
              doctor: doctor.val(),
              date: date_picker.get('select', 'yyyy/mm/dd')
          },
          success: function (data) {
              a_in_H = parseInt(data.hours[data.day]['a_in_H']);
              a_in_i = parseInt(data.hours[data.day]['a_in_i']);
              a_out_H = parseInt(data.hours[data.day]['a_out_H']);
              a_out_i = parseInt(data.hours[data.day]['a_out_i']);
  
              b_in_H = parseInt(data.hours[data.day]['b_in_H']);
              b_in_i = parseInt(data.hours[data.day]['b_in_i']);
              b_out_H = parseInt(data.hours[data.day]['b_out_H']);
              b_out_i = parseInt(data.hours[data.day]['b_out_i']);
  
              disable_hours_arr = [];
              appointments = JSON.parse(data.appointments);
              $.each(appointments, function (i, x) {
                  $time_arr = [];
                  d = new Date(x['date']);
                  $time_arr.push(d.getHours());
                  $time_arr.push(d.getMinutes());
                  disable_hours_arr.push($time_arr);
              });
              disable_hours_arr.push({
                  from: [a_out_H, a_out_i],
                  to: [b_in_H, b_in_i]
              });
              time_picker.set({
                  min: [a_in_H, a_in_i],
                  max: [b_out_H, b_out_i],
                  disable: disable_hours_arr,
              });
          }
      });
    });
  @endif
</script>