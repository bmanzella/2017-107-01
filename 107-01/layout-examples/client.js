// client.js
var superagent = require('superagent');


// Get number
// Ask if it's done every second
// When it is done do something
//    and stop asking

getNumber()
  .then(number => {
    console.log('My number is', number);
  })
  .catch(err => {
    console.error('ERROR!', err);
  });


function getNumber() {
    return new Promise((resolve, reject) => {
      superagent.get('http://localhost:2200/number')
        .end((err, res) => {
          if(err) {
            reject(err);
          } else {
            let index = res.text.indexOf(' is your number');
            let number = res.text.substring(0, index);
            resolve(number);
          }
        });
    });
}
