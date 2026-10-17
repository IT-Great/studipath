// mobile menu
const burger=document.querySelector('.burger'),menu=document.getElementById('menu');
if(burger&&menu){
  burger.addEventListener('click',()=>{const o=menu.classList.toggle('open');burger.setAttribute('aria-expanded',o)});
  menu.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{menu.classList.remove('open');burger.setAttribute('aria-expanded',false)}));
}
const yr=document.getElementById('yr');if(yr)yr.textContent=new Date().getFullYear();

// scroll reveal
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}}),{threshold:0,rootMargin:'0px 0px -8% 0px'});
document.querySelectorAll('.rv').forEach(el=>io.observe(el));

// journey: progress line + step activation + active nav link
const steps=[...document.querySelectorAll('.step')],stepsBox=document.getElementById('steps'),prog=document.getElementById('prog');
function onScroll(){
  const vh=innerHeight,mid=vh*.6;
  if(stepsBox&&prog){
    const r=stepsBox.getBoundingClientRect();
    prog.style.height=Math.max(0,Math.min(r.height,mid-r.top))+'px';
    steps.forEach(s=>s.classList.toggle('in',s.getBoundingClientRect().top<mid));
  }
  let cur='home';
  document.querySelectorAll('main section[id], #meetyourconsultant').forEach(s=>{if(s.getBoundingClientRect().top<vh*.4)cur=s.id});
  document.querySelectorAll('#menu a').forEach(a=>a.classList.toggle('on',a.getAttribute('href')==='#'+cur));
}
addEventListener('scroll',onScroll,{passive:true});addEventListener('resize',onScroll);onScroll();

// booking form -> database
(function(){
  const F=[
    {id:'email',label:'Email',type:'email',req:1},
    {id:'nama',label:'Full name',type:'text',req:1},
    {id:'wa',label:'WhatsApp number',type:'tel',req:1,hint:'Our team will contact you via WhatsApp to schedule your session.'},
    {id:'domisili',label:'City of residence',type:'text',req:1},
    {id:'peran',label:'I am registering as',type:'radio',req:1,other:1,opts:['Student','Parent / Guardian','School representative / Counsellor']},
    {id:'grade',label:'Current grade',type:'radio',req:1,other:1,opts:['Grade 7','Grade 8','Grade 9','Grade 10','Grade 11','Grade 12']},
    {id:'sekolah',label:'School',type:'text',req:1},
    {id:'kurikulum',label:'Current curriculum',type:'radio',req:1,other:1,opts:['National Curriculum','Pearson Edexcel','Cambridge','IB']},
    {id:'topik',label:'What would you like to discuss?',type:'checkbox',req:1,opts:['Pearson Edexcel preparation','Study abroad (choosing country & university)','Application & visa process','Academic guidance & student development','Scholarships & study costs','Not sure yet, I want to discuss first']},
    {id:'negara',label:'Preferred study destination',type:'text',req:1},
    {id:'jurusan',label:'Preferred field / major',type:'text'},
    {id:'mulai',label:'Planned study start year',type:'checkbox',req:1,other:1,opts:['2027','2028','2029']},
    {id:'tanya',label:'Any specific questions you would like to discuss?',type:'area',req:1},
    {id:'mode',label:'Preferred consultation mode',type:'radio',req:1,opts:['Face to Face','Zoom meeting']},
    {id:'hari',label:'Preferred days',type:'checkbox',req:1,other:1,opts:['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']},
    {id:'jam',label:'Preferred time',type:'checkbox',req:1,opts:['Morning (09.00 - 12.00)','Afternoon (12.00 - 15.00)','Late afternoon (15.00 - 17.00)','Outside work hours (by appointment)']},
    {id:'sumber',label:'How did you hear about StudiPath?',type:'text',req:1}
  ];
  const MAP={email:'email',nama:'name',wa:'whatsapp',domisili:'city',peran:'role',grade:'grade',sekolah:'school',kurikulum:'curriculum',topik:'topics',negara:'country',jurusan:'major',mulai:'start_year',tanya:'question',mode:'mode',hari:'days',jam:'times',sumber:'source'};

  const form=document.getElementById('bookForm'),
        fields=document.getElementById('fields'),
        status=document.getElementById('bookStatus'),
        done=document.getElementById('bookDone');
  if(!form||!fields||!status){console.error('Booking form elements not found.');return;}

  // render the questions
  fields.innerHTML=F.map(f=>{
    const star=f.req?' <span class="rq">*</span>':'';
    if(f.type==='radio'||f.type==='checkbox'){
      const rq=f.req&&f.type==='radio'?' required':'';
      const o=f.opts.map(v=>`<label class="opt"><input type="${f.type}" name="${f.id}" value="${v}"${rq}><span>${v}</span></label>`).join('');
      const x=f.other?`<label class="opt other"><input type="${f.type}" name="${f.id}" value="Other"${rq}><span>Other:</span><input type="text" class="oth" aria-label="Other"></label>`:'';
      return `<fieldset class="f" data-id="${f.id}"><legend class="q">${f.label}${star}</legend><div class="opts">${o}${x}</div><p class="msg" hidden>Please choose at least one option.</p></fieldset>`;
    }
    const field=f.type==='area'
      ?`<textarea id="${f.id}" rows="3"${f.req?' required':''}></textarea>`
      :`<input id="${f.id}" type="${f.type}"${f.req?' required':''}>`;
    return `<div class="f"><label class="q" for="${f.id}">${f.label}${star}</label>${f.hint?`<small>${f.hint}</small>`:''}${field}</div>`;
  }).join('');

  // focusing the "Other" text field selects its option automatically
  fields.addEventListener('focusin',e=>{
    if(e.target.classList.contains('oth')) e.target.parentNode.querySelector('input:not(.oth)').checked=true;
  });
  fields.addEventListener('change',e=>{
    const fs=e.target.closest('fieldset'); if(fs) fs.querySelector('.msg').hidden=true;
  });

  // submit -> save to database
  form.addEventListener('submit',async e=>{
    e.preventDefault();
    if(form.dataset.busy)return;
    status.classList.remove('err');
    let first=null;const data={};

    F.forEach(f=>{
      let val;
      if(f.type==='radio'||f.type==='checkbox'){
        const fs=form.querySelector(`[data-id="${f.id}"]`);
        const arr=[...fs.querySelectorAll('input:not(.oth):checked')].map(i=>
          i.value==='Other'?(i.parentNode.querySelector('.oth').value.trim()||'Other'):i.value);
        if(f.req&&!arr.length){fs.querySelector('.msg').hidden=false;first=first||fs;}
        val=f.type==='checkbox'?arr:arr.join(', ');
      }else{
        val=document.getElementById(f.id).value.trim();
      }
      data[MAP[f.id]]=val;
    });
    if(first){first.scrollIntoView({behavior:'smooth',block:'center'});return;}
    data.website=form.querySelector('[name=website]')?.value||'';

    const btn=form.querySelector('button[type=submit]'),label=btn.textContent;
    form.dataset.busy='1';btn.disabled=true;btn.textContent='Sending...';

    try{
      const res=await fetch(form.dataset.action,{
        method:'POST',
        headers:{'Content-Type':'application/json','Accept':'application/json',
                 'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]')?.content||''},
        body:JSON.stringify(data)
      });
      if(res.status===422){const j=await res.json();throw new Error(Object.values(j.errors)[0][0]);}
      if(!res.ok)throw new Error('Server error ('+res.status+').');

      form.reset();
      if(done){
        form.hidden=true;done.hidden=false;
        done.scrollIntoView({behavior:'smooth',block:'center'});
      }else{
        status.textContent='Thank you! Your booking has been received.';
      }
    }catch(err){
      console.error('Booking failed:',err);
      status.classList.add('err');
      status.innerHTML=(err.message||'Failed to send.')+' Please try again, or <a href="https://wa.me/6281235422626" target="_blank" rel="noopener">contact us on WhatsApp</a>.';
      status.scrollIntoView({behavior:'smooth',block:'center'});
    }finally{
      delete form.dataset.busy;btn.disabled=false;btn.textContent=label;
    }
  });

  // "Book another"
  const again=document.getElementById('again');
  if(again)again.addEventListener('click',()=>{
    done.hidden=true;form.hidden=false;
    form.scrollIntoView({behavior:'smooth',block:'start'});
  });
})();

// destination chips
(function(){
  const mq1=document.getElementById('mq1'),mq2=document.getElementById('mq2');
  if(!mq1||!mq2)return;
  const C=[['au','Australia'],['gb','United Kingdom'],['nz','New Zealand'],['my','Malaysia'],['ca','Canada'],['us','United States'],['jp','Japan'],['sg','Singapore']];
  const chip=([c,n])=>`<span><img src="https://flagcdn.com/w80/${c}.png" width="32" height="24" alt="" loading="lazy">${n}</span>`;
  const a=C.map(chip).join(''), b=[...C].reverse().map(chip).join('');
  mq1.innerHTML=a+a;
  mq2.innerHTML=b+b;
})();

// scroll to top
(function(){
  const b=document.getElementById('toTop'),bar=document.getElementById('toTopBar');
  if(!b||!bar)return;
  const C=2*Math.PI*21;
  bar.style.strokeDasharray=C;
  function update(){
    const h=document.documentElement.scrollHeight-innerHeight;
    const p=h>0?Math.min(1,scrollY/h):0;
    bar.style.strokeDashoffset=C*(1-p);
    b.classList.toggle('show',scrollY>400);
  }
  addEventListener('scroll',update,{passive:true});
  addEventListener('resize',update);
  update();
  b.addEventListener('click',()=>{
    const calm=matchMedia('(prefers-reduced-motion: reduce)').matches;
    scrollTo({top:0,behavior:calm?'auto':'smooth'});
  });
})();