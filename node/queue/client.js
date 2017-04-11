// client.js
var superagent = require('superagent');


// Get number
// Ask if it's done every second
// When it is done do something
//    and stop asking

getNumber()
  .then(number => {
    console.log('My number is', number);
    return askTillDone(number);
  })
  .then(() => {
    console.log('All done!');
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

function askTillDone(number) {
  return new Promise((resolve, reject) => {
    var interval = setInterval(() => {
      superagent.get('http://localhost:2200/number/' + number)
        .end((err, res) => {
          if(err || !res.ok) {
            reject(err || res.text);
          } else if(res.body.status === 'done') {
            resolve();
          } else {
            //do nothing and let the interval go again
            console.log('Not done yet...');
            return;
          }
          clearInterval(interval); // stop the interval
        });
    }, 1000);
  });
}





///
