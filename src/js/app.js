document.querySelector('[data-menu-button]')?.addEventListener('click',()=>document.querySelector('[data-menu]')?.classList.toggle('open'));
document.querySelectorAll('[data-confirm]').forEach(form=>form.addEventListener('submit',event=>{if(!window.confirm(form.dataset.confirm||'Confirma esta operação?'))event.preventDefault()}));
