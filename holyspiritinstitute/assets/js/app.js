
document.addEventListener('DOMContentLoaded',()=>{
 document.querySelectorAll('[data-modal]').forEach(b=>b.addEventListener('click',()=>{
   const m=document.getElementById(b.dataset.modal); if(m)m.classList.add('show');
 }));
 document.querySelectorAll('.modal').forEach(m=>{
   m.addEventListener('click',e=>{if(e.target===m)m.classList.remove('show')});
   const c=m.querySelector('.close'); if(c)c.addEventListener('click',()=>m.classList.remove('show'));
 });
 document.addEventListener('keydown',e=>{if(e.key==='Escape')document.querySelectorAll('.modal.show').forEach(m=>m.classList.remove('show'))});
 document.querySelectorAll('[data-search]').forEach(input=>{
   input.addEventListener('input',()=>{
     const table=document.querySelector(input.dataset.search); if(!table)return;
     const q=input.value.toLowerCase().trim();
     table.querySelectorAll('tbody tr').forEach(r=>r.style.display=r.innerText.toLowerCase().includes(q)?'':'none');
   });
 });
 document.querySelectorAll('[data-confirm]').forEach(a=>a.addEventListener('click',e=>{
   if(!confirm(a.dataset.confirm||'Are you sure?'))e.preventDefault();
 }));
 const path=location.pathname;
 document.querySelectorAll('.sidebar a').forEach(a=>{if(a.getAttribute('href')&&path.endsWith(a.getAttribute('href').split('/').pop()))a.classList.add('active')});
});
