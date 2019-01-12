import TypeIt from 'typeit';

new TypeIt('#type-tagline')
    .type('Maintaining the word count')
    .pause(750)
    .type(',')
    .pause(250)
    .break()
    .type('while making the words count')
    .pause(500)
    .type('.');
// Maintaining the word count,
// while making the words count.

// new TypeIt('#type-tagline', {
//         deleteSpeed: 75
//     })
//     .type('Excelllu')
//     .pause(500)
//     .delete(2)
//     .type('ant freelance copyrighter')
//     .pause(1000)
//     .type(' with a')
//     .break()
//     .type('nack')
//     .pause(500)
//     .type(' for proff')
//     .pause(250)
//     .delete(2)
//     .type('ofrea')
//     .pause(100)
//     .delete(1)
//     .type('eding');
// Excellant freelance copyrighter with a
// nack for proofreeding.
