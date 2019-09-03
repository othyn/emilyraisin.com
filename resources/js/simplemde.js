import SimpleMDE from 'simplemde';
import 'simplemde/dist/simplemde.min.css';

let blogBody = document.getElementById("body")

let simpleMDEBlogBody = new SimpleMDE({
    element: blogBody
});

blogBody.simpleMde = simpleMDEBlogBody
// Store the instance against the element to stop scope creep
