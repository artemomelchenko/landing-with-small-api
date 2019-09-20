function catalogBuilder() {
  const containers = {
    descrtion: document.getElementsByClassName("brand-description")[0],
    sliderColor: document.getElementById("item-slider"),
    navBrand: document.getElementsByClassName("nav-brand")[0],
    brandData: ""
  };

  function brandContainer(data) {
    containers.navBrand.getElementsByTagName("li");
    let len = data.length;
    for (let i = 0; i < len; i++) {
      let item = document.createElement("li");
      item.setAttribute("data-id", data[i].id);
      item.className = "brand-item";
      item.innerHTML = `<span class="item-title">${data[i].type}</span>
            <span class="item-name">${data[i].name}</span>`;
      containers.navBrand.appendChild(item);
    }
    containers.navBrand.getElementsByTagName("li")[0].classList.add("active");
  }

  function colorSlider(data) {
    const colorInfoInit = colorName => {
      let isExist = document.getElementsByClassName("colorInfo")[0];
      let color = colorName || data.colorSlider[0].colorName;

      if (isExist) {
        isExist.remove();
      }
      let el = document.createElement("div");
      el.className = "colorInfo";
      el.innerText = color;
      document.getElementById("item-slider").appendChild(el);
    };
    let isExist = document
      .getElementById("item-slider")
      .classList.contains("slick-initialized");
    const sliderImages = () => {
      let slider = document.getElementById("item-slider");
      let len = data.colorSlider.length;

      const initImg = slider => {
        for (let i = 0; i < len; i++) {
          let img = document.createElement("img");
          let path = data.colorSlider[i].img;
          img.src = "img/" + path;
          img.className = "slider-item";
          slider.appendChild(img);
        }
      };

      if (isExist) {
        $("slider").slick("unslick");
        $(".slider").remove();
        let el = document.createElement("div");
        el.id = "item-slider";
        el.className = "slider";
        document.getElementsByClassName("color-slider")[0].prepend(el);
        initImg(el);
        $(".slider").slick({
          dots: true,
          arrows: true
        });
      } else {
        initImg(slider);
        $(".slider").slick({
          dots: true,
          arrows: true
        });
      }
      $(".slider").on("afterChange", function() {
        const active = this.querySelector("li.slick-active");
        colorInfoInit(active.dataset.set);
      });

      const colorDots = () => {
        let dots = document
          .getElementsByClassName("slick-dots")[0]
          .getElementsByTagName("button");
        let li = document
          .getElementById("item-slider")
          .getElementsByTagName("li");

        for (let i = 0, len = dots.length; i < len; i++) {
          li[i].style.borderColor = data.colorSlider[i].color;
          dots[i].style.background = data.colorSlider[i].color;
          li[i].setAttribute("data-set", data.colorSlider[i].colorName);
        }
      };
      colorDots();
      colorInfoInit();
    };
    sliderImages();
  }

  function description(data) {
    let isExist = document
      .getElementsByClassName("brand-carusel")[0]
      .classList.contains("slick-initialized");

    const renderTitle = data => {
      const title = containers.descrtion.getElementsByTagName("h3")[0];
      title.innerHTML = `${data.type}<br/><span>${data.name}</span>`;
    };

    const renderBrandSlider = (data, arr) => {
      let container = document.getElementsByClassName("slider-wrap")[0];
      const res = data;
      let len = res.length;
      const initImg = () => {
        let slider = containers.descrtion.getElementsByClassName(
          "brand-carusel"
        )[0];
        for (let i = 0; i < len; i++) {
          let img = document.createElement("img");
          let item = res[i];
          img.src = "img/" + item.path;
          img.setAttribute("data-id", item.name);
          slider.appendChild(img);
        }
      };
      if (isExist) {
        $(".brand-carusel").slick("unslick");
        $(".brand-carusel").remove();
        let el = document.createElement("div");
        el.className = "brand-carusel";
        container.appendChild(el);
        initImg();
        $(".brand-carusel").slick({
          arrows: true
        });
      } else {
        initImg();
        $(".brand-carusel").slick({
          arrows: true
        });
      }
      $(".brand-carusel").on("afterChange", function() {
        const active = this.querySelector(".slick-active").dataset.id;
        const brandsData = arr.filter(el => el.name == active)[0];

        renderPrice(brandsData.price);
        renderPropertys(brandsData.propertys);

      });
    };

    const renderPrice = data => {
      const price = containers.descrtion.getElementsByClassName("price")[0];
      price.innerHTML = data;
    };

    function renderPropertys(data) {
      const res = data;
      const table = containers.descrtion.getElementsByClassName(
        "items-propery"
      )[0];
      table.innerHTML = null;

      table.innerHTML = `<caption>Характеристики</caption>`;
      for (let i = 0, len = res.length; i < len; i++) {
        let tr = document.createElement("tr");
        tr.innerHTML = `
                <td class="title">${res[i].name}</td>
                <td class="value ${(i == 0)?'premium':''}">${res[i].value}</td>`;
        table.appendChild(tr);
      }
    };
    function dataController(data) {
      let propertys = data.description[0].propertys,
        brandSlider = data.description[0].brandsImages,
        price = data.description[0].price,
        title = { type: data.type, name: data.name };
      
      renderTitle(title);
      renderPrice(price);
      renderBrandSlider(brandSlider, data.description);
      renderPropertys(propertys);
    }

    dataController(data);
  }

  function sectionNavigation() {
    const brands = containers.navBrand.getElementsByTagName("li");
    const catalogMenu = document.getElementsByClassName("catalog-menu")[0];
    const products = catalogMenu.getElementsByTagName("li");

    for (let i = 0, len = brands.length; i < len; i++) {
      brands[i].addEventListener("click", function(e) {
        let target = this;
        if (!target.classList.contains("active")) {
          let prev = containers.navBrand.getElementsByClassName("active")[0];
          prev.classList.remove("active");
          target.classList.add("active");
          changeBrand(target.dataset);
        }
      });
    }

    for (let i = 0, len = products.length; i < len; i++) {
      products[i].setAttribute("data-set", i);
      products[i].addEventListener("click", function() {
        let target = this;
        if (!target.classList.contains("active")) {
          let prev = catalogMenu.getElementsByClassName("active")[0];
          prev.classList.remove("active");
          target.classList.add("active");
        }
        // changeBrand();
      });
    }
  }

  function showPremium(){
    const premium = document.getElementsByClassName('premium')[0];
    const wrap = document.getElementsByClassName('info-wrap')[0];
    premium.addEventListener('click', function() {
    wrap.classList.add('active');
    document.body.addEventListener('click', function(e) {
      console.log(e.target == premium);
      if(e.target != premium) {
        premium.classList.remove('active');
      }
    },false)
    })
   }

  function changeBrand(item) {
    const id = item.id;
    let data = containers.brandData.items.filter(el => el.id == id)[0];
    console.log(data);
    colorSlider(data);
    description(data);
  }

  function renderSection(){
    brandContainer(containers.brandData.items);
    colorSlider(containers.brandData.items[0]);
    description(containers.brandData.items[0]);
    showPremium();
    sectionNavigation();
  }

  function navBrandSlider() {
    let slider = document.createElement('div');
    slider.className = 'nav_brand_slider';
    slider.innerHTML = `
    <ul class="nav-slider">
      <li data-set="0">металочерепиця</li>
      <li data-set="1">профнастил</li>
      <li data-set="2">євробрус</li>
      <li data-set="3">секційна огорожа</li>
      <li data-set="4">комплектуючі</li>
      <li data-set="5">металочерепиця</li>
    </ul>`;
    document.getElementsByClassName('brand-container')[0].appendChild(slider);
    $(".nav-slider").slick({
      arrows: true
    });

    $('.nav-slider').on("afterChange", function() {
      console.log('object');
    });
  }
  return {
    render: renderSection,
    setBrands: function(data) {
      containers.brandData = Object.assign({}, data);
    },
    navBrandSlider: navBrandSlider
  };
}
