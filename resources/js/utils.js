// UTILITY FILE FOR GENERAL HELPER FUNCTIONS

/**
 * Checks if an object is empty in Javascript
 * 
 * @param {*} obj The object you want to check the length of
 * @returns {Boolean}
 */
export const isEmpty = (obj) => Object.keys(obj).length === 0;

/**
 * Appends a div to parent  
 * 
 * @param {*} divId 
 * @param {*} content 
 * @returns 
 */
export const appendDivToParent = (divId, content = "") => {
    const element = document.getElementById(divId);
    if (!element) return console.error(`${divId} not found`, divId);

    const parent = element.parentNode;
    if (!parent) return console.error(`${divId} has no parent`, divId);

    const div = document.createElement("div");
    div.innerHTML = content;

    parent.appendChild(div);
}