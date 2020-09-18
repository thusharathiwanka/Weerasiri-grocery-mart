const url = new URL(location);
url.searchParams.delete("edit");
history.replaceState(null, null, url);
console.log(url);
