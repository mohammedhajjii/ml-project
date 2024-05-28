package ml.cf.collaborativefilteing.models;

import lombok.*;
import org.springframework.data.cassandra.core.mapping.Column;
import org.springframework.data.cassandra.core.mapping.PrimaryKey;
import org.springframework.data.cassandra.core.mapping.Table;

@Table("books")
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Builder
@ToString
public class Book {
    @PrimaryKey
    private Integer bookId;
    private String isbn;
    private String title;
    private String author;
    private int year;
    private String publisher;
    @Column("image_s")
    private String imageS;
    @Column("image_m")
    private String imageM;
    @Column("image_l")
    private String imageL;
}
