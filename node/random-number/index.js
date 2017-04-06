console.log('Generating a random number');

var result = 0;

for(var i = 0; i < 1000000000; i++){
	result+= Math.random() + 1;
}

console.log('Result is:', result);



