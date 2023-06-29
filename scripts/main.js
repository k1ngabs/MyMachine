var sidenav = document.getElementById("sidenav");
var header = document.getElementById("header");
var main = document.getElementById("main");
var aside = document.getElementById("aside");
var sidenav = document.getElementById("sidenav");
var body = document.body;
var internNav = document.getElementById("internNav");
var maincontent = document.getElementById("maincontent");
var aside = document.getElementById("aside");
var inAside = document.getElementById("productBox");


// API de DarkMode
function collapseNav(){
    sidenav.classList.toggle("shrinked");
    internNav.classList.toggle("collapsed");
}

function collapseAside(){
    aside.classList.toggle("shrinked");
    inAside.classList.toggle("collapsed");
}

document.addEventListener('DOMContentLoaded', function() {
  let darkMode = localStorage.getItem('darkMode') === 'true';
if(darkMode){
    document.getElementById("darkModeToggle").checked = true;
}else{
    document.getElementById("darkModeToggle").checked = false;
}
  function toggleDarkMode() {
    darkMode = !darkMode;
    localStorage.setItem('darkMode', darkMode); // Atualiza o valor no Local Storage
    applyDarkMode();
    console.log(applyDarkMode());
  }

  function applyDarkMode() {
    if (darkMode) {
      document.body.classList.add('darkMode');
      aside.classList.add('darkModeIntern');
      maincontent.classList.add('darkModeIntern');
    } else {
      document.body.classList.remove('darkMode');
      aside.classList.remove('darkModeIntern');
      maincontent.classList.remove('darkModeIntern');
    }
  }

  applyDarkMode();

const darkModeToggle = document.getElementById('darkModeToggle');
  darkModeToggle.addEventListener('click', toggleDarkMode);
});


//LISTAR PRODUTOS MERCADOLIVRE API
function fetchProducts(query) {
    return new Promise((resolve, reject) => {
        const url = `https://api.mercadolibre.com/sites/MLB/categories/MLB1658/search?q=${query}`;
        
      fetch(url)
        .then(response => response.json())
        .then(data => resolve(data.results))
        .catch(error => reject(error));
    });
  }

  const cartItems = [];

function addToCart(product) {
    cartItems.push(product);
    console.log(cartItems);
    const listItem = document.getElementById('listProduct');
  
      const image = document.createElement('input');
      image.type = 'image';
      image.src = product.thumbnail;
  
      const title = document.createElement('input');
      title.value = product.title;
  
      const price = document.createElement('input');
      price.value = `Preço: R$ ${product.price}`;

      const link = document.createElement('a');
      link.value = `Link para o Produto`;
      link.href = product.permalink;

      listItem.appendChild(image);
      listItem.appendChild(title);
      listItem.appendChild(price);
      listItem.appendChild(link);
      console.log(product);
  }

function renderProductList(products) {
    const productList = document.getElementById('productList');
  
    // Limpa a lista de produtos
    productList.innerHTML = '';
  
    // Itera sobre os produtos e cria os elementos HTML para cada um
    products.forEach(product => {
      const listItem = document.createElement('li');
      listItem.className = 'product-list-item';
  
      const image = document.createElement('img');
      image.src = product.thumbnail;
  
      const title = document.createElement('h3');
      title.textContent = product.title;
  
      const price = document.createElement('p');
      price.textContent = `Preço: R$ ${product.price}`;
  
      const addToCartButton = document.createElement('button');
    addToCartButton.textContent = 'Adicionar à Lista';
    addToCartButton.addEventListener('click', () => addToCart(product));


    
      listItem.appendChild(image);
      listItem.appendChild(title);
      listItem.appendChild(price);
      listItem.appendChild(addToCartButton);
  
      productList.appendChild(listItem);
    });
  }

  async function fetchAndRenderProducts() {
      var test = document.getElementById("search");
      console.log(test);
    try {
      const products = await fetchProducts(test.value);
      renderProductList(products);
    } catch (error) {
      console.error('Erro ao buscar os produtos:', error);
    }
  }
  