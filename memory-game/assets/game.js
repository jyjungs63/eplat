
const searchParams = new URLSearchParams(location.search);
var clas = searchParams.get('clas');
var sor  = searchParams.get('sor');
if ( clas == '' || clas == null)
    clas = 'y7';
if ( sor == '' || sor == null)
    sor = 'sentens';

const selectors = {
    boardContainer: document.querySelector('.board-container'),
    board: document.querySelector('.board'),
    moves: document.querySelector('.moves'),
    timer: document.querySelector('.timer'),
    start: document.querySelector('button'),
    win: document.querySelector('.win')
}

const state = {
    gameStarted: false,
    flippedCards: 0,
    totalFlips: 0,
    totalTime: 0,
    loop: null
}

const shuffle = array => {
    const clonedArray = [...array]

    for (let index = clonedArray.length - 1; index > 0; index--) {
        const randomIndex = Math.floor(Math.random() * (index + 1))
        const original = clonedArray[index]

        clonedArray[index] = clonedArray[randomIndex]
        clonedArray[randomIndex] = original
    }

    return clonedArray
}

const pickRandom = (array, items) => {
    const clonedArray = [...array]
    const randomPicks = []

    for (let index = 0; index < items; index++) {
        const randomIndex = Math.floor(Math.random() * clonedArray.length)
        
        randomPicks.push(clonedArray[randomIndex])
        clonedArray.splice(randomIndex, 1)
    }

    return randomPicks
}

const generateGame = () => {
    const dimensions = selectors.board.getAttribute('data-dimension')

    if (dimensions % 2 !== 0) {
        throw new Error("The dimension of the board must be an even number.")
    }

    let emojis = ['PH-1.jpg', 'PH-2.jpg', 'PH-3.jpg', 'PH-4.jpg', 'PH-5.jpg', 'PH-6.jpg', 'PH-7.jpg', 'PH-8.jpg']
    if ( sor != 'sentens')
        emojis = ['PS-1.jpg', 'PS-2.jpg', 'PS-3.jpg', 'PS-4.jpg', 'PS-5.jpg', 'PS-6.jpg', 'PS-7.jpg', 'PS-8.jpg'];
    //const emojis = ['family_1.png', 'family_2.png', 'family_3.png', 'family_4.png', 'family_5.png', 'family_6.png', 'family_7.png', 'family_8.png', 'family_9.png', 'family_10.png']
    //const emojis = ['🥔', '🍒', '🥑', '🌽', '🥕', '🍇', '🍉', '🍌', '🥭', '🍍']
    const picks = pickRandom(emojis, (dimensions * dimensions) / 2) 
    const items = shuffle([...picks, ...picks])
    const cards = `
        <div class="board" style="grid-template-columns: repeat(${dimensions}, auto)">
            ${items.map((item, index)  => `
                <div class="card">  
                <div class="card-front" style="color: white; font-size: 3rem; justify-content: center;align-items: center;display: flex">${index+1}</div>                                   
                    <div class="card-back "><img  style="width:100%; height: 100%" class="img-responsive" src=assets/${clas}/${item}></img></div>
                </div>
            `).join('')}
       </div>
    `
    // <div class="card-front" style="background-image: url('assets/front.png');background-size: contain;background-position: center;"></div>
    //  <div class="card-front" style="color: white; font-size: 3rem; justify-content: center;align-items: center;display: flex">${index+1}</div>  
    // <div class="card-front"><img  style="width:100%; height: 100%" class="img-responsive" src=assets/front.png></img></div> 
    //<div class="card-back">${item}</div>
    const parser = new DOMParser().parseFromString(cards, 'text/html')

    selectors.board.replaceWith(parser.querySelector('.board'))
}

const startGame = () => {
    state.gameStarted = true
    selectors.start.classList.add('disabled')

    state.loop = setInterval(() => {
        state.totalTime++

        selectors.moves.innerText = `${state.totalFlips} moves`
        selectors.timer.innerText = `time: ${state.totalTime} sec`
    }, 1000)
}

const flipBackCards = () => {
    document.querySelectorAll('.card:not(.matched)').forEach(card => {
        card.classList.remove('flipped','shake')
    })

    state.flippedCards = 0
}

const flipCard = card => {
    state.flippedCards++
    state.totalFlips++

    if (!state.gameStarted) {
        startGame()
    }

    if (state.flippedCards <= 2) {
        card.classList.add('flipped')
    }

    if (state.flippedCards === 2) {
        const flippedCards = document.querySelectorAll('.flipped:not(.matched)')

        if (flippedCards[0].lastElementChild.innerHTML == flippedCards[1].lastElementChild.innerHTML) {
            //if (flippedCards[0].innerText === flippedCards[1].innerText) {
            flippedCards[0].classList.add('matched')
            flippedCards[1].classList.add('matched')

            // const mydom = new DOMParser().parseFromString(flippedCards[0].innerHTML, 'text/html')
            // let sound = replaceFileExtension( mydom.getElementsByTagName('img')[0].attributes['src'].value, 'wav')
            // var audio = new Audio(sound);
            // audio.play();
        }

            setTimeout(() => {
                flippedCards[0].classList.add('shake');
                flippedCards[1].classList.add('shake');
            }, 400);


        setTimeout(() => {
            flipBackCards()
        }, 1000)
    }
    //const mydom = new DOMParser().parseFromString(card.innerHTML, 'text/html')
    let sound = replaceFileExtension( card.getElementsByTagName('img')[0].attributes['src'].value, 'wav')
    var audio = new Audio(sound);
    audio.play();

    // If there are no more cards that we can flip, we won the game
    if (!document.querySelectorAll('.card:not(.flipped)').length) {
        setTimeout(() => {
            selectors.boardContainer.classList.add('flipped')
            selectors.win.innerHTML = `
                <span class="win-text">
                    You won!<br />
                    with <span class="highlight">${state.totalFlips}</span> moves<br />
                    under <span class="highlight">${state.totalTime}</span> seconds
                </span>
            `
            var audio = new Audio('assets/success.mp3');
            audio.play();
            clearInterval(state.loop)
        }, 1000)
    }
}

function replaceFileExtension(fileName, newExtension) {
    // Find the last dot in the file name
    var lastDotIndex = fileName.lastIndexOf('.');

    // Check if a dot is found and it's not the first character
    if (lastDotIndex !== -1 && lastDotIndex > 0) {
        // Replace the old extension with the new one
        var newFileName = fileName.substr(0, lastDotIndex) + '.' + newExtension;
        return newFileName;
    } else {
        // No dot found or dot is at the beginning, simply append the new extension
        return fileName + '.' + newExtension;
    }
}


const attachEventListeners = () => {
    document.addEventListener('click', event => {
        const eventTarget = event.target
        const eventParent = eventTarget.parentElement

        if (eventTarget.className.includes('card') && !eventParent.className.includes('flipped')) {
            flipCard(eventParent)
        } else if (eventTarget.nodeName === 'BUTTON' && !eventTarget.className.includes('disabled')) {
            startGame()
        }
    })
}

generateGame()
attachEventListeners()