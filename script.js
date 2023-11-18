const signupParent = document.getElementById('sign-up-parent');
const loginParent = document.getElementById('log-in-parent');

// sign-up LOGIC:
const signUpForm = document.getElementById('sign-up-form');
const email1 = document.getElementById('email1');
const password1 = document.getElementById('password1');
const confirmPassword = document.getElementById('confirm-password');

signUpForm.addEventListener('submit', function(event) {
    event.preventDefault();
    // xml for create dataBase and table if they are not exist
    const xhr0 = new XMLHttpRequest(); 
    xhr0.open('GET', 'createDB.php', true);
    xhr0.send();
    xhr0.addEventListener('load', function() {

        const xhr1 = new XMLHttpRequest();
        xhr1.open('POST', 'sign-up.php', true);
        const formData = new FormData(signUpForm);
        xhr1.send(formData);
        xhr1.addEventListener('load', function() {
            console.log(this.responseText);
            if (this.responseText == 'Email Already Exist') {
                alert('Email Already Exist');
            }else if(this.responseText == 'not the same password') {
                alert('not the same password');
            }
            else {
                signupParent.classList.toggle('Hidden');
                loginParent.classList.toggle('Hidden');
            }
        })
    })
})

// log-in LOGIC:
const logInHere = document.getElementById('log-in-here');
const logIn = document.getElementById('log-in-form');
const email2 = document.getElementById('email2');
const password2 = document.getElementById('password2');
const userSection = document.getElementById('user-section'); 
const productParent = document.getElementById('product-parent');

function addProduct() {
    const xhr4 = new XMLHttpRequest();
    xhr4.open('GET', 'productsDB.php', true);
    xhr4.send();

    xhr4.addEventListener('load', function () {
        console.log(this.responseText);
        cardsParent.innerHTML = this.responseText;

        /* EDIT LOGIC START */
        const CARDS = document.querySelectorAll('.EDITING');

        // Set up form submission event listener only once
        editForm.addEventListener('submit', function (event) {
            console.log('Fuck EveryBody');
            event.preventDefault();
            const productName2 = document.getElementById('product-name2');
            const productPrice2 = document.getElementById('product-price2');

            const formData = new FormData();
            formData.append('product_name2', productName2.value);
            formData.append('product_price2', productPrice2.value);
            formData.append('product_id', productId);
            console.log('v2 this productId => '+productId);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'editProduct.php', true);
            xhr.onerror = function () {
                console.error('Request failed');
            };
            xhr.send(formData);
            xhr.addEventListener('load', function () {
                console.log(this.responseText);
                editingParent.classList.toggle('Hidden');
                userSection.classList.toggle('Hidden');
                // test
               
            });
        });
        let productId;
        for (const card of CARDS) {
            card.addEventListener('click', function () {
                productId = card.id;
                console.log('v1 this productId => '+productId);
                editingParent.classList.toggle('Hidden');
                userSection.classList.toggle('Hidden');
            });
        }
        /* EDIT LOGIC END */
    });
}

logIn.addEventListener('submit', function(event) {
    event.preventDefault(); 

    const xhr2 = new XMLHttpRequest(); 
    xhr2.open('POST', 'log-in.php', true); 
    const formData = new FormData(logIn);
    xhr2.send(formData);
    xhr2.addEventListener('load', function() {
        if (this.responseText == 'Successfull') {
            loginParent.classList.toggle('Hidden');
            userSection.classList.toggle('Hidden');
            addProduct();
            
        }else {
            alert('Not Valid Email/Password');
        }
    })
}); 
logInHere.addEventListener('click', function() {
    console.log('testing');
    signupParent.classList.toggle('Hidden'); 
    loginParent.classList.toggle('Hidden');
});

// add-button LOGIC: 
const addButton = document.getElementById('add-button');
addButton.addEventListener('click', function() {
    userSection.classList.toggle('Hidden');
    productParent.classList.toggle('Hidden');
})

// back-button LOGIC: 
const backButton = document.getElementById('back-button'); 
backButton.addEventListener('click', function() {
    userSection.classList.toggle('Hidden');
    productParent.classList.toggle('Hidden');
})

// product-form LOGIC: 
const productForm = document.getElementById('product-form');
const productName = document.getElementById('product-name'); 
const productPrice = document.getElementById('product-price');
const cardsParent = document.getElementById('cards-parent');

productForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const xhr3 = new XMLHttpRequest(); 
    xhr3.open('POST', 'insertProduct.php', true); 
    const formData = new FormData(productForm);
    xhr3.send(formData);
    xhr3.addEventListener('load', function() {
        
        console.log(this.responseText);

        if (this.responseText.substring(0, 12) == 'missed input') {
            alert('Missed Input');
        }else {
            userSection.classList.toggle('Hidden'); 
            productParent.classList.toggle('Hidden');

            addProduct();
        }
    })
})

// Editing LOGIC: 
const editingParent = document.getElementById('editing-parent');
const editForm = document.getElementById('edit-form');