#split keywords for metadata search online
setwd("/home/ilaria/Desktop/metadata_search/keywords_catalogue/R_scripts")
list.files()
df <- read.csv('metadata_keywords20170328.csv', header = TRUE)
df
s <- strsplit(as.character(df$keywords), ',')
df2 <- data.frame(keywords=unlist(s), uniqueResourceID=rep(df$uniqueResourceID, sapply(s, FUN=length)))
df2
df2 <- data.frame(lapply(df2, trimws))

write.csv(df2, "keywords20170328_for_search.csv")



