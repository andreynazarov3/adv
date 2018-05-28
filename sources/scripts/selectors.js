NodeList.prototype.on = function (events, callback) {
    let eventList = events.split(' ');
    this.forEach((item) => {
        for (let ev in eventList) {
            item.addEventListener(eventList[ev], callback);
        }
    });
};