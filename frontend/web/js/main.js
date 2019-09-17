window.addEventListener("DOMContentLoaded", event => {
  if(screen.width > 1024){
    sectionScrollInit();
    document.getElementsByTagName('main')[0].classList.add('desktop');
  }
   viewPortInfo.backGroundLines.classList.add('active');
   catalogSectionInit();
  });

  var viewPortInfo = {
    isWhiteTheme: true,
    backGroundLines : document.getElementsByClassName('background-animation')[0]
  }

  function catalogSectionInit() {
    const data = Object.assign({}, response);
    const catalog = catalogBuilder();
    catalog.render(data);
  }
  
  function sectionScrollInit() {
    const container = document.getElementById("section_scroll");
    let $scroller = $(".scroller");
    let _isAnim = false;
    const colorMap = [true, false, true, true, false, true, false, true, false];
    const backGroundAnim = Array.from(document.getElementsByClassName('background-animation'));
    
    const isWhiteTheme = (pos) => colorMap[pos];
  
    let scrollData = {
      _current: 1,
      setSection: function(value) {
        scrollData._current = value;
      },
      navItems: Array.prototype.slice.call(container.getElementsByTagName('li')),
      activeSection: container.getElementsByClassName('active')[0],
      
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

    console.log(indicator.getOption('elem'));
  
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
          console.log(scrollData._current); 
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


  $(".circle_namber").click(function () {
		$(".circle_namber").removeClass("circle_namber_activ", "owl-item" );
		$(this).addClass("circle_namber_activ");
	})
 
  var $homeSlider = $(".advantage_slider, .work_process_slider");

  $(window).resize(function() {
    showHomeSlider();
  });

  function showHomeSlider() {
    if ($homeSlider.data("owlCarousel") !== "undefined") {
      if (window.matchMedia('(max-width: 480px)').matches) {
        initialHomeSlider();
      } else {
        destroyHomeSlider();
      }
    }
  }
  showHomeSlider();

  function initialHomeSlider() {
    $homeSlider.addClass("owl-carousel").owlCarousel({
      items: 1,
      margin: 10,
      dots:true,
      center: true,
      autoWidth: true,
      autoWidth: 0
      
    });
  }

  function destroyHomeSlider() {
    $homeSlider.trigger("destroy.owl.carousel").removeClass("owl-carousel");
  }
  
 
  // , .work_process_slider
