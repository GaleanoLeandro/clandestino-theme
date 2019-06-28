const masonryLayout = (containerElem, columns) => {
  const initialColumns = columns
  // Declare md size
  const md = window.matchMedia('(min-width : 768px) and (max-width : 992px)')

  // Masonry element
  let masonryElem = document.querySelector(`.${containerElem}`) || document.querySelector(`#${containerElem}`)

  if (masonryElem !== null) {
    // Masonry childs
    let childs = [...masonryElem.children]
    // Amount of columns
    let columnsElements = []
    // add class 'masonry-item' if childs not have them
    childs.map(child => {
      if (!child.classList.contains('masonry-item')) {
        child.classList.add('masonry-item')
      }
    })
  
    md.addListener(WidthChange)
  
    WidthChange(md)
  
    function WidthChange (mq) {
      mq.matches ? columns = 2 : columns = initialColumns;

      masonryColumnClass(columns)
      addColumns(masonryElem, columns, columnsElements)
      addChilds(childs, columns, columnsElements)

      removeEmptyChilds(masonryElem, columns)
    }
    
  
  }
  function masonryColumnClass (cols) {
    // Auto add class to display masonry layout
    removeClassByPrefix(masonryElem, 'columns-')
    masonryElem.classList.add('masonry-layout', `columns-${cols}`)
  }

  function removeClassByPrefix (el, prefix) {
    let regx = new RegExp('\\b' + prefix + '.*?\\b', 'g')
    el.className = el.className.replace(regx, '')
    return el
  }

  function addColumns (el, cols, colsEl) {
    for (let i = 1; i <= cols; i++) {
      let column = document.createElement('div')
      // masonry-column is an posible helper class
      column.classList.add('masonry-column', `column-${i}`)
      el.appendChild(column)
      colsEl.push(column)
    }
  }

  function addChilds (childItems, cols, colsEl) {
    /*
      Math.ceil redondea para arriba.
      Ejemplo 10 items y 3 columnas..
        Math.ceil(childs.length / columns)
        Math.ceil(10/3) // 3.3333
      Math.ceil redondea hacia 4 permitiendo hacer 4 recorridos y no dejar hijos sin recorrer
    */
    // Horizontal cicle
    for (let m = 0; m < Math.ceil(childItems.length / cols); m++) {
      // Vertical cicle
      for (let n = 0; n < cols; n++) {
        let item = childItems[m * cols + n]
        if (item != null) {
          colsEl[n].appendChild(item)
        }
      }
    }
  }

  function removeEmptyChilds (containerEl, columns) {
    let childs = [...containerEl.children]

    for (let i = 0; i < childs.length; i++) {
      if (i > columns) {
        childs[i].remove()
      }
    }
  }
  
}

masonryLayout('masonry', 3)

