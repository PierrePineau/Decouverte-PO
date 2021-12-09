btn_eat = document.querySelector('#btn-eat');
btn_sleep = document.querySelector('#btn-sleep');
btn_run = document.querySelector('#btn-run');
eat = document.querySelector('.eat');

btn_eat.addEventListener('click', () => {
  eat.classList.toggle('active')
  ajax('Homer','eat','bean');
})

var name_instance;
var name_function;
var value;
// function ajax(name_instance, name_function, value){
//     fetch('ajax.php?personnage='+name_instance+'&'+name_function+'='+value).then(function(response) {
//         if(response.ok) {
//             response.json().then(function() {
              
            
//             });
//             console.log('Ajax true' + name_instance + name_function + value);
//         } else {
//           console.log('Mauvaise réponse du réseau');
//         }
//       })
//       .catch(function(error) {
//         console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
//       });
// }

async function ajax(name_instance, name_function, value){
  const response = await fetch('ajax.php?personnage='+name_instance+'&'+name_function+'='+value);
  const infos = await response.json();
  console.log(infos);
  console.log('enter');
}