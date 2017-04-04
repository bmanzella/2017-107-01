// media.js

// I need a way to play all 4 songs when they press one of the four buttons

function playSeanPaul() {
  // Get the audio tag
  var audioTag = document.querySelector('#song1');
  var icon = document.querySelector('#play1 i');
  var button = document.querySelector('#play1');

  if(icon.className == 'glyphicon glyphicon-play') {
    // if the button is a play button,
    // change to a pause button
    icon.className = 'glyphicon glyphicon-pause';
    button.className = 'btn btn-danger';
    // and play the song
    audioTag.play();
  } else {
    // if the button is a pause button,
    // change to a play button
    icon.className = 'glyphicon glyphicon-play';
    button.className = 'btn btn-success';
    // and pause the song
    audioTag.pause();
  }
}

function playGarthBrooks() {
  // Get the audio tag
  var audioTag = document.querySelector('#song2');
  var icon = document.querySelector('#play2 i');
  var button = document.querySelector('#play2');

  if(icon.className == 'glyphicon glyphicon-play') {
    // if the button is a play button,
    // change to a pause button
    icon.className = 'glyphicon glyphicon-pause';
    button.className = 'btn btn-danger';
    // and play the song
    audioTag.play();
  } else {
    // if the button is a pause button,
    // change to a play button
    icon.className = 'glyphicon glyphicon-play';
    button.className = 'btn btn-success';
    // and pause the song
    audioTag.pause();
  }
}

function playLaurynHill() {
  // Get the audio tag
  var audioTag = document.querySelector('#song3');
  var icon = document.querySelector('#play3 i');
  var button = document.querySelector('#play3');

  if(icon.className == 'glyphicon glyphicon-play') {
    // if the button is a play button,
    // change to a pause button
    icon.className = 'glyphicon glyphicon-pause';
    button.className = 'btn btn-danger';
    // and play the song
    audioTag.play();
  } else {
    // if the button is a pause button,
    // change to a play button
    icon.className = 'glyphicon glyphicon-play';
    button.className = 'btn btn-success';
    // and pause the song
    audioTag.pause();
  }
}

function playSkrillex() {
  // Get the audio tag
  var audioTag = document.querySelector('#song4');
  var icon = document.querySelector('#play4 i');
  var button = document.querySelector('#play4');

  if(icon.className == 'glyphicon glyphicon-play') {
    // if the button is a play button,
    // change to a pause button
    icon.className = 'glyphicon glyphicon-pause';
    button.className = 'btn btn-danger';
    // and play the song
    audioTag.play();
  } else {
    // if the button is a pause button,
    // change to a play button
    icon.className = 'glyphicon glyphicon-play';
    button.className = 'btn btn-success';
    // and pause the song
    audioTag.pause();
  }
}
