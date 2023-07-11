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
var updateUser = document.getElementById("updateUser");
var valorTotal = document.getElementById("valorTotal")
var totalPrice;


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
    const url = `https://api.mercadolibre.com/sites/MLB/search?q=${query}&category=MLB1648`;
    
    fetch(url)
    .then(response => response.json())
    .then(data => resolve(data.results))
    .catch(error => reject(error));
  });
}

const cartItems = [];
function calculatePrice(){
cartItems.forEach(product => {
  valorTotal.innerHTML = totalPrice + product.price;
});  
}


function addToCart(product) {
    cartItems.push(product);
    const cartPre = JSON.stringify(cartItems);
    localStorage.setItem('cart', cartPre);
    
    
    const listItem = document.getElementById('listProduct');
    
    
    const itemL = document.createElement('div');
    itemL.id = 'prod';
    
    const image = document.createElement('img');
    image.src = product.thumbnail;
    
    const title = document.createElement('p');
    title.id = 'prodTitle';
    title.innerHTML = product.title;
    
    const price = document.createElement('p');
    price.id = 'price';
    price.innerHTML = `R$ ${product.price}`;
    
    const mercadoImg = document.createElement('img');
    mercadoImg.src = 'images/mercadolivre.png';
    mercadoImg.width = 35;
    mercadoImg.height = 20;
  
    const link = document.createElement('a');
    link.href = product.permalink;

  
    const prodId = document.createElement('input');
    prodId.setAttribute('type', 'hidden');
    prodId.value = product.id;
    prodId.setAttribute('name', 'prodId[]');

    // const catId = document.createElement('input');
    // catId.setAttribute('type', 'hidden');
    // catId.value = product.category_id;
    // catId.setAttribute('name', 'catId[]');

    const removeFromCart = document.createElement('button');
    removeFromCart.type = 'button';
    removeFromCart.textContent = 'Remover';
    removeFromCart.addEventListener('click', () => {
      listItem.removeChild(itemL); // Remove o itemL (elemento pai do botão "Remover") da lista
      const cartItems = JSON.parse(localStorage.getItem('cart'));
      const updatedCartItems = cartItems.filter((item) => item.id !== product.id);
      localStorage.setItem('cart', JSON.stringify(updatedCartItems));
    });
  
    
    listItem.appendChild(itemL);
    itemL.appendChild(image);
    itemL.appendChild(title);
    itemL.appendChild(price);
    itemL.appendChild(link);
    itemL.appendChild(prodId);
    link.appendChild(mercadoImg);
    itemL.appendChild(removeFromCart);
    console.log(product);
    calculatePrice()
  }

  function qlqrDesgrassa(){
    const cartItemsStorage = localStorage.getItem('cart');
      if (cartItemsStorage) {
        const piru = JSON.parse(cartItemsStorage);
        piru.forEach((product) => addToCart(product));
        
      }
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

  function gerarPDF() {
    const doc = new window.jspdf.jsPDF();
  
    const lista = ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5'];
  
    let y = 20; // Posição vertical inicial
  
    cartItems.forEach((produto) => {
        const { permalink, price, title } = produto;

        doc.text(5, y, `Nome: ${title}`);
        doc.text(5, y+10, `Preço: R$ ${price}`);
        doc.text(5, y+20, `${permalink}`);
    
        y += 30; // Incrementa a posição vertical para o próximo produto
      });
  
    doc.save('lista.pdf'); // Salva o PDF com o nome "lista.pdf"
  }
  
  function gerarCanva(){
    html2canvas(document.querySelector("#capture")).then(canvas => {
    maincontent.appendChild(canvas)
  });
  }

  function collUpdateUser(){
    updateUser.classList.toggle("displayN");
  }