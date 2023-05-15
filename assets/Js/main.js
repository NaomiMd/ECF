jQuery(function($)
{
    $('#datepicker').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        maxDate: '2023-08-31',
        monthNames: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        dayNamesMin: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
        onSelect: function(a, b){
            a = new Date();
            a.setFullYear(b.selectedYear, b.selectedMonth, b.selectedDay);
            if(a.getDay() == 0 || a.getDay() == 1)
            {
                $(b.input).val(b.lastVal);
            }
        },
    });

    $('#datetimepicker5').datetimepicker({
        format: 'H:i',
        datepicker: false,
        theme: 'dark',
        allowTimes: [
            '12:00', '12:15', '12:30', '12:45', '13:00',
            '19:00', '19:15', '19:30', '19:45', '20:00'
        ],
        interval: 15
    });
});

 
// navbar scroll //

let navBar = document.querySelector('.navbar');

window.addEventListener('scroll', () =>{
    if(window.scrollY > 300)
    {
        navBar.classList.add('navbar-scrolled');
    }else{
        navBar.classList.remove('navbar-scrolled');
    }
})