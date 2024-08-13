class Button {
    constructor(n, l) {
        this.name = n;
        this.link = l;
    }

    GetButton() {
        return `<button class="button" onclick="${this.link}" type="button">${this.name}</button>`;
    }
}

let activeTab;
let lastTab = "fs";
let navigationPath = [];

let fs = {
    "Q4": {
        "button": new Button(`Q4`, "changeFolder('Q4')"),
        "links": {
            "JavaScript": {
                "button": new Button(`JavaScript`, "changeFolder('JavaScript')"),
                "links": {
                    "Week 1": {
                        "button": new Button(`Week 1`, "changeFolder('Week 1')"),
                        "links": [
                            new Button(`Pong`, "location.href='Q4/Javascript/Week1/pong'")
                        ]
                    },
                    "Week 2": {
                        "button": new Button(`Week 2`, "changeFolder('Week 2')"),
                        "links": [
                            new Button(`Pong Part 1`, "location.href='Q4/Javascript/Week2/pong'"),
                            new Button(`Pong Part 2`, "location.href='Q4/Javascript/Week2/pong-part2'"),
                            new Button(`Pong Part 3`, "location.href='Q4/Javascript/Week2/pong-part3'"),
                            new Button(`Pong Part 4`, "location.href='Q4/Javascript/Week2/pong-part4'"),
                            new Button(`Pong Part 5`, "location.href='Q4/Javascript/Week2/pong-part5'"),
                            new Button(`Pong Part 6`, "location.href='Q4/Javascript/Week2/pong-part6'")
                        ]
                    },
                    "Week 3": {
                        "button": new Button(`Week 3`, "changeFolder('Week 3')"),
                        "links": [
                            new Button(`Pong Part 1`, "location.href='Q4/Javascript/Week3/pong'"),
                            new Button(`Pong Part 2`, "location.href='Q4/Javascript/Week3/pong-part2'"),
                            new Button(`Pong Part 3`, "location.href='Q4/Javascript/Week3/pong-part3'"),
                            new Button(`Pong Part 4`, "location.href='Q4/Javascript/Week3/pong-part4'"),
                            new Button(`Pong Part 5`, "location.href='Q4/Javascript/Week3/pong-part5'")
                        ]
                    },
                    "Week 4": {
                        "button": new Button(`Week 4`, "changeFolder('Week 4')"),
                        "links": [
                            new Button(`Menus Part 1`, "location.href='Q4/Javascript/Week4/menus'"),
                            new Button(`Menus Part 2`, "location.href='Q4/Javascript/Week4/menus-part2'"),
                            new Button(`Menus Part 3`, "location.href='Q4/Javascript/Week4/menus-part3'"),
                            new Button(`Menus Part 4`, "location.href='Q4/Javascript/Week4/menus-part4'"),
                        ]
                    },
                    "Week 5": {
                        "button": new Button(`Week 5`, "changeFolder('Week 5')"),
                        "links": []
                    },
                    "Week 6": {
                        "button": new Button(`Week 6`, "changeFolder('Week 6')"),
                        "links": []
                    },
                    "Week 7": {
                        "button": new Button(`Week 7`, "changeFolder('Week 7')"),
                        "links": []
                    },
                    "Week 8": {
                        "button": new Button(`Week 8`, "changeFolder('Week 8')"),
                        "links": []
                    },
                    "Week 9": {
                        "button": new Button(`Week 9`, "changeFolder('Week 9')"),
                        "links": []
                    },
                    "Week 10": {
                        "button": new Button(`Week 10`, "changeFolder('Week 10')"),
                        "links": []
                    },
                }
            },
            "DotNet": {
                "button": new Button(`DotNet`, "changeFolder('DotNet')"),
                "links": {
                    "Week 1": {
                        "button": new Button(`Week 1`, "changeFolder('Week 1')"),
                        "links": [
                            new Button(`Web Calculator`, "location.href='https://web-calculator.azurewebsites.net'"),
                        ]
                    },
                    "Week 2": {
                        "button": new Button(`Week 2`, "changeFolder('Week 2')"),
                        "links": [
                            new Button(`Game Site`, "location.href='https://backendlogin.azurewebsites.net'"),
                        ]
                    },
                    "Week 3": {
                        "button": new Button(`Week 3`, "changeFolder('Week 3')"),
                        "links": []
                    },
                    "Week 4": {
                        "button": new Button(`Week 4`, "changeFolder('Week 4')"),
                        "links": []
                    },
                    "Week 5": {
                        "button": new Button(`Week 5`, "changeFolder('Week 5')"),
                        "links": []
                    },
                    "Week 6": {
                        "button": new Button(`Week 6`, "changeFolder('Week 6')"),
                        "links": []
                    },
                    "Week 7": {
                        "button": new Button(`Week 7`, "changeFolder('Week 7')"),
                        "links": []
                    },
                    "Week 8": {
                        "button": new Button(`Week 8`, "changeFolder('Week 8')"),
                        "links": []
                    },
                    "Week 9": {
                        "button": new Button(`Week 9`, "changeFolder('Week 9')"),
                        "links": []
                    },
                    "Week 10": {
                        "button": new Button(`Week 10`, "changeFolder('Week 10')"),
                        "links": []
                    },
                }
            },
            "Data Analysis": {
                "button": new Button(`Data Analysis`, "changeFolder('Data Analysis')"),
                "links": {
                    "Week 1": {
                        "button": new Button(`Week 1`, "changeFolder('Week 1')"),
                        "links": [
                            new Button(`Binary/ Decimal Converter`, "location.href='https://www.programiz.com/online-compiler/1uyt3bMkdHYrD'"),
                        ]
                    },
                    "Week 2": {
                        "button": new Button(`Week 2`, "changeFolder('Week 2')"),
                        "links": []
                    },
                    "Week 3": {
                        "button": new Button(`Week 3`, "changeFolder('Week 3')"),
                        "links": []
                    },
                    "Week 4": {
                        "button": new Button(`Week 4`, "changeFolder('Week 4')"),
                        "links": []
                    },
                    "Week 5": {
                        "button": new Button(`Week 5`, "changeFolder('Week 5')"),
                        "links": []
                    },
                    "Week 6": {
                        "button": new Button(`Week 6`, "changeFolder('Week 6')"),
                        "links": []
                    },
                    "Week 7": {
                        "button": new Button(`Week 7`, "changeFolder('Week 7')"),
                        "links": []
                    },
                    "Week 8": {
                        "button": new Button(`Week 8`, "changeFolder('Week 8')"),
                        "links": []
                    },
                    "Week 9": {
                        "button": new Button(`Week 9`, "changeFolder('Week 9')"),
                        "links": []
                    },
                    "Week 10": {
                        "button": new Button(`Week 10`, "changeFolder('Week 10')"),
                        "links": []
                    },
                }
            }
        }
    },
    "Q5": {
        "button": new Button(`Q5`, "changeFolder('Q5')"),
        "links": {}
    },
    "Q6": {
        "button": new Button(`Q6`, "changeFolder('Q6')"),
        "links": {}
    }
};

activeTab = fs;

function makeButtons() {
    let temp = "";
    let div = document.getElementById("jsButtons");
    for (let key in activeTab) {
        try {
            temp += activeTab[key]["button"].GetButton();
        } catch {
            try {
                if (activeTab.length > 0) {
                    for (i=0;i<activeTab.length;i++) {
                        temp += activeTab[i].GetButton();
                    } 
                    break;
                } else {
                    console.log("No Button or Links");
                }
            } catch {
                console.log("No Button or Links");
            }
        }
    }
    console.log(`Full List: ` + temp);
    if (navigationPath.length > 0) {
        temp += `<br><br><a href="#" onclick="goBack()">< Back</a>`;
    }
    div.innerHTML = temp;
}

function goBack() {
    if (navigationPath.length > 0) {
        activeTab = navigationPath.pop();
        console.log(`Go Back: `, activeTab);
        makeButtons();
    } else {
        console.log("Already at root level.");
    }
}

function changeFolder(newFolder) {
    try {
        navigationPath.push(activeTab);
        activeTab = activeTab[newFolder]["links"];
        console.log(`Change Folder: `, newFolder, activeTab);
        makeButtons();
    } catch (e) {
        console.error("Error changing folder:", e);
        navigationPath.pop();
    }
}
