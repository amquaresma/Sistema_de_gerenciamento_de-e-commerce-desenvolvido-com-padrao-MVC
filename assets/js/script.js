document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    const formCategoria = document.getElementById('formCategoria');
    if (formCategoria) {
        formCategoria.addEventListener('submit', function(e) {
            const nomeCategoria = document.getElementById('nome_categoria').value.trim();
            
            if (nomeCategoria === '') {
                e.preventDefault();
                alert('Por favor, preencha o nome da categoria.');
                return false;
            }
            
            if (nomeCategoria.length < 3) {
                e.preventDefault();
                alert('O nome da categoria deve ter pelo menos 3 caracteres.');
                return false;
            }
        });
    }

    const formProduto = document.getElementById('formProduto');
    if (formProduto) {
        formProduto.addEventListener('submit', function(e) {
            const nomeProduto = document.getElementById('nome_produto').value.trim();
            const preco = parseFloat(document.getElementById('preco').value);
            const estoque = parseInt(document.getElementById('estoque').value);
            
            if (nomeProduto === '') {
                e.preventDefault();
                alert('Por favor, preencha o nome do produto.');
                return false;
            }
            
            if (nomeProduto.length < 3) {
                e.preventDefault();
                alert('O nome do produto deve ter pelo menos 3 caracteres.');
                return false;
            }
            
            if (isNaN(preco) || preco < 0) {
                e.preventDefault();
                alert('Por favor, insira um preço válido.');
                return false;
            }
            
            if (isNaN(estoque) || estoque < 0) {
                e.preventDefault();
                alert('Por favor, insira uma quantidade de estoque válida.');
                return false;
            }
        });
    }

    const formCliente = document.getElementById('formCliente');
    if (formCliente) {
        formCliente.addEventListener('submit', function(e) {
            const nomeCliente = document.getElementById('nome_cliente').value.trim();
            const email = document.getElementById('email').value.trim();
            
            if (nomeCliente === '') {
                e.preventDefault();
                alert('Por favor, preencha o nome do cliente.');
                return false;
            }
            
            if (nomeCliente.length < 3) {
                e.preventDefault();
                alert('O nome do cliente deve ter pelo menos 3 caracteres.');
                return false;
            }
            
            if (email === '') {
                e.preventDefault();
                alert('Por favor, preencha o email.');
                return false;
            }
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, insira um email válido.');
                return false;
            }
        });
    }

    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.remove();
            }, 500);
        }, 5000);
    });
});
