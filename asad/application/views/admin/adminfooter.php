</div>
  </div>
  <script>
      feather.replace();
      $(document).ready(function(){
        $.ajax({
          url: "<?php echo base_url() ?>blog/blog_content_list", 
          success: function(result){
          console.log('berhasil');
          console.log(result);
        }});

        $('#upload_thumb').on('change', function(){
          var input = this;
          var url = $(this).val();
          var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
          if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
          {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#img_thumb').attr('src', e.target.result);
              }
            reader.readAsDataURL(input.files[0]);
          }
          else
          {
            $('#img').attr('src', '/assets/no_preview.png');
          }
        });

        $('#logout').on('click', function(){
          $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
            buttons: {
                cancel: function () {
                },
                somethingElse: {
                    text: 'Logout',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                       var logout = "<?php echo base_url(); ?>logout";
                       window.location.replace(logout);
                      }
                  }
              }
          });
        });

      });
    </script>

  <!-- Graphs -->
  <!-- <script>
    var ctx = document.getElementById("myChart"); 
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
          data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false,
        }
      }
    });
  </script> -->
</body>

</html>