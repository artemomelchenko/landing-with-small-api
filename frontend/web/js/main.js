window.addEventListener("DOMContentLoaded", event => {
  if(isDesktop()){
    sectionScrollInit();
    document.getElementsByTagName('main')[0].classList.add('desktop');
    mobileBackgroundLines(8);
  }
  else {
    let count = screen.width <= 500?3:5;
    mobileBackgroundLines(count);
    console.log(count);
    if(count < 5) {
      advantageSlider();
    }
  }
   viewPortInfo.backGroundLines.classList.add('active');
   catalogSectionInit();
  });

  function isDesktop() {
     return screen.width <= 1024?false:true;
  }

  function mobileBackgroundLines(count){
    let backgrounds = Array.from(document.getElementsByClassName('background-animation'));
    const buildLine = (el) => {
        for(let i = 0; i < count; i++) {
          let line = document.createElement('div');
          line.className = 'line';
          el.appendChild(line);
        }
    }
    backgrounds.forEach(function(el) {
      el.innerHTML = null;
      buildLine(el);
    });
  }

  var viewPortInfo = {
    isWhiteTheme: true,
    backGroundLines : document.getElementsByClassName('background-animation')[0]
  }
  
  function catalogSectionInit() {
    const data = Object.assign({}, metalTile);
    const catalog = catalogBuilder();
    catalog.setBrands(data);
    catalog.render();
    catalog.navBrandSlider();
  }
  
  function sectionScrollInit() {
    const container = document.getElementById("section_scroll");
    let $scroller = $(".scroller");
    let _isAnim = false;
    const colorMap = [true, false, true, true, false, true, false, true, false];
    const backGroundAnim = Array.from(document.getElementsByClassName('background-animation'));
    const calc_price = document.getElementById('calc_price');

    const isWhiteTheme = (pos) => colorMap[pos];
  
    let scrollData = {
      _current: 1,
      setSection: function(value) {
        scrollData._current = value;
      },
      navItems: Array.prototype.slice.call(container.getElementsByTagName('li')),
      activeSection: container.getElementsByClassName('active')[0]

    };
    const disableSection = () => {scrollData.activeSection.classList.remove('active')};
  
    function switchLines() {
      disableSection();
      let targetItem  = scrollData.navItems[scrollData._current - 1];
      
      if(!isWhiteTheme(scrollData._current - 1)){
        container.classList.add('white');
        viewPortInfo.isWhiteTheme = true;
      }
      else{
        container.classList.remove('white');
        viewPortInfo.isWhiteTheme = false;
      }
      targetItem.classList.add('active');
      scrollData.activeSection = targetItem;
    }

    function animBackground(section){
      backGroundAnim[section].classList.add('active');
    }
  
    let indicator = new WheelIndicator({
      callback: e => {
        switch (e.direction) {
          case "up":
            if (scrollData._current === 1 || _isAnim) return;
            TweenMax.to($scroller, 1, {
              y: "+=" + $(window).height(),
              ease: Power3.easeInOut,
              onStart: () => {
                scrollData._current--;
                animBackground(scrollData._current - 1);
                disableSection();
                _isAnim = true;
              },
              onComplete: () => {
                switchLines();
                _isAnim = false;
              }
            });
            break;
          default:
            if (scrollData._current === 9 || _isAnim) return;
            TweenMax.to($scroller, 1, {
              y: "-=" + $(window).height(),
              ease: Power3.easeInOut,
              onStart: () => {
                scrollData._current++;
                animBackground(scrollData._current - 1);
                disableSection();
                _isAnim = true;
              },
              onComplete: () => {
                 switchLines();
                _isAnim = false;
              }
            });
        }
      }
    });

    calc_price.addEventListener('click', function() {
      TweenMax.to($scroller, 1, {
        y: '-=' + ($(window).height() * 3),
        ease: Power3.easeInOut,
        onStart: () => {
          _isAnim = true;
        },
        onComplete: () => {
          switchLines();
         _isAnim = false;
       }
      });
      scrollData._current = 8;
    });

    function init() {
      let items =  Array.from(container.getElementsByTagName('li'));
      items.forEach(function(li){
        li.addEventListener('mouseover', function(){
          this.classList.add('show');
          container.classList.remove('curtain');
        });

        li.addEventListener('mouseout', function(){
          this.classList.remove('show');
          container.classList.add('curtain');
        });

        li.addEventListener('click', function() {
          const targetSection = parseInt(this.getAttribute('data-order'));
          const getDirection = () => targetSection > scrollData._current?'-=':'+=';
          const  direction = getDirection();
          const translateY = () => {
            let res = $(window).height() * (targetSection - scrollData._current);
            if(res > 0) {
              return res;
            }
            else if(res < 0) {
              return -res
            }
            else {
              return 0;
            }
          }
          TweenMax.to($scroller, 1, {
            y: `${direction} ${translateY()}`,
            ease: Power3.easeInOut,
            onStart: () => {
              container.classList.add('prevent_click');
              _isAnim = true;
            },
            onComplete: () => {
              container.classList.remove('prevent_click');
              switchLines();
             _isAnim = false;
           }

          });
          scrollData._current = targetSection;
        })
      })
      container.addEventListener("click", function(e) {
        e.preventDefault();
        let target = e.target.tagName == 'LI'?e.target:e.target.parentNode;
        if(target.tagName == 'LI' || target.tagName == 'A'  ){
          let prevActiveSection = container.getElementsByClassName("active")[0];
          prevActiveSection.classList.remove("active");
          target.classList.toggle("active");
        }
      });
    }

    init();
  }
  

// GOOGLE MAP 
// function initMap() {
//     var location = 
//         {
//             lat: 48.2835717, 
//             lng: 25.936441
//         };
//     var map = new google.maps.Map(
//         document.getElementById('map'), 
//         {
//             zoom: 4, 
//             center: location
//         });
    
//     var marker = new google.maps.Marker(
//         {
//             position: location, 
//             map: map
//         });
//   }


  // $(".circle_namber").click(function () {
	// 	$(".circle_namber").removeClass("circle_namber_activ", "owl-item" );
	// 	$(this).addClass("circle_namber_activ");
  // })
  
//  OWL CARUSEL
  // var $homeSlider = $(".advantage_slider, .work_process_slider");

  // $(window).resize(function() {
  //   showHomeSlider();
  // });

  // function showHomeSlider() {
  //   if ($homeSlider.data("owlCarousel") !== "undefined") {
  //     if (window.matchMedia('(max-width: 480px)').matches) {
  //       initialHomeSlider();
  //     } else {
  //       destroyHomeSlider();
  //     }
  //   }
  // }
  // showHomeSlider();

  // function initialHomeSlider() {
  //   $homeSlider.addClass("owl-carousel").owlCarousel({
  //     items: 1,
  //     margin: 10,
  //     dots:true,
  //     center: true,
  //     autoWidth: true,
  //     autoWidth: 0
      
  //   });
  // }

  // function destroyHomeSlider() {
  //   $homeSlider.trigger("destroy.owl.carousel").removeClass("owl-carousel");
  // }
  // OWL CARUSEL END

  function advantageSlider() {
    $(".advantage_grid_container").slick({
      arrows: true
    });

    $(".work_process_content ").slick({
      arrows: true,
      dots: true
    });    
  }



  

  // FORM VALIDATION
function displayModal(){
  const eclipse = document.getElementById('eclipse');
  const btns = Array.from(document.getElementsByClassName('modal'));
  const closeBtn = Array.from(document.getElementsByClassName('button_close'));

  eclipse.addEventListener('click', function() {
    document.getElementsByClassName('popup active')[0].classList.remove('active');
    eclipse.classList.remove('active');
    $('input').val('');
  });
  console.log(btns);
  btns.forEach(function(el) {
    console.log(el);
    el.addEventListener('click', function(e) {
      e.preventDefault();
      let target = e.target;
      let popup = document.getElementsByClassName('popup')[0];
      console.log(el);
      if(target.tagName == 'A') {
        popup.getElementsByTagName('h3')[0].innerHTML = 'ОТРИМАТИ ЗНИЖКУ';
        popup.getElementsByTagName('form')[0].setAttribute('data-form','getDiscont');
        popup.classList.add('active');
      }
      else {
        popup.getElementsByTagName('h3')[0].innerHTML = 'ОТРИМАТИ РОЗРАХУНОК';
        popup.getElementsByTagName('form')[0].setAttribute('data-form','getPrice');
        popup.classList.add('active');
      }
      eclipse.classList.add('active');
    })
  });

  closeBtn.forEach(function(el) {
    el.addEventListener('click', function() {
      let form = el.parentElement;
      $('input').val('');
      eclipse.classList.remove('active');
      form.classList.remove('active');
    });
  })
}

displayModal();
  $(document).ready(function() {
    // POPUP
      // $(".btn_header").click(function () {
      //   $(".popup").show();
      // })
      // $(".button_close").click(function(){
      //   $(".popup").hide();
      // })
      // POPUP END
    $(".tel").mask("+38(099) 999-99-99");
 
    $('.popup').submit(function(event){
      event.preventDefault();
      let path = window.location.pathname; 
      let csrfToken = $('meta[name="csrf-token"]').attr("content");
      let formsData = {
        "form-name": event.target.getAttribute('data-form'),
        "name":  event.target.getElementsByClassName('name')[0].value,
        "phone":  event.target.getElementsByClassName('tel')[0].value
      };
      
      console.log("TCL: formsData", formsData)

      $.ajax({
        url: path,
        dataType: 'json',
        // contentType: "application/json; charset=utf-8",
        type: 'POST',
        data: {data: formsData, '_csrf-frontend': csrfToken},
        success: function(response){
          console.log('response');
          document.getElementById('gratitude').classList.add('active');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          
        }
      });
    })
    // FORM CATALOG
    $('.form_catalog_product').submit(function(event){
      event.preventDefault();
      let path = window.location.pathname; 
      let csrfToken = $('meta[name="csrf-token"]').attr("content");
      let formsData = {
        "form-name": event.target.getAttribute('data-form'),
        "name":  event.target.getElementsByClassName('fName')[0].value,
        "phone":  event.target.getElementsByClassName('tel')[0].value
      };
      
      console.log("TCL: formsData", formsData)

      $.ajax({
        url: path,
        dataType: 'json',
        // contentType: "application/json; charset=utf-8",
        type: 'POST',
        data: {data: formsData, '_csrf-frontend': csrfToken},
        success: function(response){
          console.log('response');
          // document.getElementById('gratitude').classList.add('active');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          
        }
      });
    })
     // FORM CATALOG END

      // FORM CALCULATOR
    $('.form_calculator').submit(function(event){
      event.preventDefault();
      let path = window.location.pathname; 
      let csrfToken = $('meta[name="csrf-token"]').attr("content");
      let form = event.target;
      let formsData = {
        "form-name": form.getAttribute('data-form'),
        "manifacturer": form.getElementsByClassName('manifacturer_')[0].value,
        "depth": form.getElementsByClassName('depth_')[0].value,
        "area": form.getElementsByClassName('area_')[0].value,
        "name":  form.getElementsByClassName('fName')[0].value,
        "phone":  form.getElementsByClassName('tel')[0].value
      };
      
      console.log(formsData)

      $.ajax({
        url: path,
        dataType: 'json',
        // contentType: "application/json; charset=utf-8",
        type: 'POST',
        data: {data: formsData, '_csrf-frontend': csrfToken},
        success: function(response){
          console.log('response');
          // document.getElementById('gratitude').classList.add('active');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          
        }
      });
    })
     // FORM CALCULATOR END
  });
 
  
     
     
 
      

    

 
  
  