#include <stdio.h>
#include <stdlib.h>
#include <conio.h>

struct node{
    int data;
    struct node *next;
};

void inList(struct node** p)
{
     int num;
     printf("Enter a number: ");
     scanf("%d", &num);

     while(*p != NULL){
          p = &(*p)->next;
     }
     struct node *link = (struct node*) malloc(sizeof(struct node));
     link->next = *p;
     link->data = num;
     *p = link;
}

void inFirst(struct node** p)
{
     int num;
     printf("Enter a number: ");
     scanf("%d", &num);

     while(*p != NULL && (*p)->data <= num){
          p = &(*p)->next;
     }
     struct node *link = (struct node*) malloc(sizeof(struct node));
     link->next = *p;
     link->data = num;
     *p = link;
}

void displayList(struct node* p)
{
     printf("**************************************\n");
     if(p == NULL){
          printf("List is empty!");
     }else{
          while(p != NULL){
                  if(p->next == NULL){
                        printf("%d", p->data);
                  }else{
                        printf("%d -> ", p->data);
                  }
                  p = p->next;
          }
     }
     printf("\n**************************************\n\n");
}

void deleteList(struct node** p)
{
     struct node* temp;
     int num;
     printf("Enter a number: ");
     scanf("%d", &num);

     for(;*p != NULL && (*p)->data != num; p = &(*p)->next){}

     if(*p == NULL){
           printf("Not in list!");
     }else{
           temp = *p;
           *p = temp->next;
           free(temp);
     }
}

void searchList(struct node* p)
{
     int num;
     int ctr = 1;
     printf("Enter a number to search: ");
     scanf("%d", &num);

     while(p != NULL && p->data != num){
             ctr++;
             p = p->next;
     }
     if(p == NULL){
        printf("Number not found in list!");
     }else{
        printf("Number in the list! Node #%d", ctr);
     }
}

int main(void)
{
    struct node *head = NULL;
    int given, choice=1;

    while(choice < 4){
        system("cls");
        displayList(head);
        printf("1 - Insert Number\n");
        printf("2 - Delete Number\n");
        printf("3 - Search List\n");
        printf("4 - Exit\n");
        printf("Enter choice: ");
        scanf("%d", &choice);
        switch(choice){
               case 1:  inFirst(&head); break;
               case 2:  deleteList(&head); break;
               case 3:  searchList(head); break;
               default: break;
        }
        if(choice < 4 && choice > 1){
          printf("\nPress any key to continue...");
          getch();
        }
    }
    printf("\nGoodbye!");
    getch();
    return 0;
}
