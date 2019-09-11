function catalogBuilder() {
    const containers = {
      descrtion: document.getElementsByClassName('brand-description')[0],
      sliderColor: document.getElementById('item-slider'),
      navBrand: document.getElementsByClassName('nav-brand')[0]
    }

    function brandContainer(data) {
        containers.navBrand.getElementsByTagName('li');
        let len = data.items.length;
        for(let i = 0; i < len; i++) {
            let item = document.createElement('li');
            item.className = 'brand-item';
            item.innerHTML = 
            `<span class="item-title">${data.items[i].type}</span>
            <span class="item-name">${data.items[i].name}</span>`;
            containers.navBrand.appendChild(item);
        }
        containers.navBrand.getElementsByTagName('li')[0].classList.add('active');
    }

  

    function colorSlider(data) {
        const colorInfoInit = (color) => {
          let el = document.createElement('div');
          el.className = 'colorInfo';
          el.innerText = color;
          containers.sliderColor.appendChild(el);
        };

        const sliderImages = () => {
            let len = data.items[0].colorSlider.length;
            for(let i = 0; i < len; i++) {
                let img = document.createElement('img');
                let path = data.items[0].colorSlider[i].img;
                img.src = 'img/' + path;
                img.className = 'slider-item';
                containers.sliderColor.appendChild(img);
            }
            $('.slider').slick({
                dots: true,
                arrows: true
             });
        };

        const colorDots = () => {
            const dots = containers.sliderColor.getElementsByClassName('slick-dots')[0].getElementsByTagName('button');
            const li =  containers.sliderColor.getElementsByTagName('li');
           
            for(let i = 0, len = dots.length; i < len; i++) {
                li[i].style.borderColor = data.items[i].colorSlider[i].color;
                dots[i].style.background = data.items[i].colorSlider[i].color;
            }
        }
        sliderImages();
        colorDots();
        colorInfoInit(data.items[0].colorSlider[0].colorName);
     }

     function description(data){
        $('.brand-carusel').slick({
          arrows: true
       });

       const renderTitle = (data) => {
           const res = data.items[0];
            console.log(data);
           const title = containers.descrtion.getElementsByTagName('h3')[0];
           title.innerHTML = `${res.type}<br/><span>${res.name}</span>`;
           console.log(title, res);
        }
        renderTitle(data);

       const priceContainer = (value) => {
          let el = document.createElement('div');
          el.className = 'items-price';
          return el;
       }
    }

    
    function renderSection(data){
        brandContainer(data);
        colorSlider(data);
        description(data);

    }
     return {
        render: renderSection
     }
}