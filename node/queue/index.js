var app = require('express')();

var queue = []; // no items in the queue to start
var currentNumber = 0;

/////////////////////////////
//       QUEUE LOGIC       //
/////////////////////////////
// setInterval runs a function every x milliseconds
var interval = setInterval(() => {
	// get one not done item
	// if one exists, process
	// else, do nothing
	let item = queue.find(i => i.status === 'not done');
	if(item != null) {
		item.status = 'done';
	}
}, 10000);

app.get('/', (req, res) => {
	res.send('Alive!');
});

app.get('/queue', (req, res) => {
	res.send(JSON.stringify(queue, null, 2));// send a pretty json string
});

app.get('/number', (req, res) => {
	currentNumber++;
	queue.push({
		number: currentNumber,
		status: 'not done'
	});
	res.send(currentNumber + ' is your number');
});

app.get('/number/:number', (req, res) => {
	res.json(
		queue.find(i => i.number == req.params.number)
	);
});

app.listen(2200, () => console.log('Server is running:'));
