export function get(key) {
		let item = localStorage.getItem(key);

		try {
			return JSON.parse(item);
		} catch (err) {
			return item;
		}
	}

	export function set(key, value) {
    if(typeof value === "object") {
      this.storage.setItem(key, JSON.stringify(value));
    } else {
      this.storage.setItem(key, value);
    }
  }

  export function remove(key) {
    this.storage.removeItem(key);
  }

  export function clear() {
    this.storage.clear();
  }
